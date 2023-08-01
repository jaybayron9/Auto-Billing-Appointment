<?php 

namespace Data\Admin; 
use Convo\Convo;
use DBConn\DBConn;

class Admin extends DBConn {
    public function todays_appointments() {
        $result = parent::DBQuery("SELECT
                ap.schedule_date,
                ap.appointment_status,
                bh.available_time,
                cs.plate_no
            FROM
                appointments ap
            JOIN cars cs ON ap.car_id = cs.id
            JOIN bussiness_hours bh ON bh.id = ap.service_time_id
            WHERE
                ap.schedule_date >= CURRENT_DATE
                AND ap.appointment_status = 'Confirmed'
            UNION
            SELECT
                app.schedule_date,
                app.appointment_status,
                bhh.available_time,
                app.plate_no
            FROM
                walkin app
            JOIN bussiness_hours bhh ON bhh.id = app.service_time_id
            WHERE
                app.schedule_date >= CURRENT_DATE
                AND app.appointment_status = 'Confirmed'
            ORDER BY schedule_date ASC");
        return json_encode($result); 
    }

    public function appointment_status() { 
        DBConn::update('appointments',[
            'appointment_status' => $_POST['status']
        ], "id = '{$_POST['id']}'");  

        $info = DBConn::select('appointments', '*', ['id' => $_POST['id']]); 
        $schedule = date('F d, Y', strtotime($info[0]['schedule_date'])); 
        $time = DBConn::select('bussiness_hours', '*', ['id' => $info[0]['service_time_id']]);
        $message = "Your appointment for $schedule | {$time[0]['available_time']}  has been {$_POST['status']}.";

        Convo::$from_id = "64";
        Convo::$to_id = $info[0]['user_id'];
        Convo::$msg = $message;
        Convo::send();

        return DBConn::resp();
    } 

    public function cancel_walkin() {
        parent::delete('walkin', ['id' => $_POST['id']]);  
        return parent::resp(200, ' ');
    }

    public function send_msg() {
        parent::insert('convo', [
            'from_user' => $_SESSION['admin_id'],
            'send_to' => $_POST['user_id'],
            'message' => $_POST['message']
        ]);

        $_SESSION['alert'] = 'Message sent.'; 
        return parent::resp();
    }

    public function assign_employee() { 
        parent::update('appointments', [
            'assigned_employee_id' => $_POST['mechanic'] . ', ' . $_POST['electrician']
        ], "id = '{$_POST['app_id']}'"); 
        $_SESSION['alert'] = 'Employee successfully assigned.'; 
    }

    public function create_walkin() { 
        parent::insert('walkin', [
            'name' => $_POST['name'],
            'email' => $_POST['email'], 
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'plate_no' => $_POST['plate_no'],
            'service_id' => $_POST['service'],
            'brand' => $_POST['brand'],
            'model' => $_POST['model'],
            'schedule_date' => $_POST['schedule'],
            'service_time_id' =>$_POST['time']
        ]); 
        $_SESSION['alert'] = 'Walk-in successfully added.'; 
    }

    public function customer_payment() {
        extract($_POST); 
        $data = explode(' | ', $name);
        $_SESSION['alert'] = 'Payment successfully added.'; 
        $id = count($data) == 2 ? true : false; 

        if ($id && $type == 'user') {   
            $users = DBConn::select('users', '*', ['id' => $data[0]]);
            foreach ($users as $user) {
                DBConn::insert('payments', [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'description' => "(User) $description",
                    'total_due' => $amount
                ]);
            }

            DBConn::update('appointments', [
                'payment_status' => 'Paid',
            ], "id = {$data[0]}"); 
        } 

        if ($id && $type == 'walkin') {
            $walkin = DBConn::select('walkin', '*', ['id' => $data[0]]);
            if ($walkin) {
                DBConn::insert('payments', [
                    'name' => $walkin[0]['name'],
                    'email' => $walkin[0]['email'],
                    'phone' => $walkin[0]['phone'],
                    'description' => "(Walkin) $description",
                    'total_due' => $amount
                ]); 
            } else {
                $id = false;
            }
        } 
        
        if (!$id) {
            DBConn::insert('payments', [
                'name' => $data[0], 
                'description' => "(Walkin) $description",
                'total_due' => $amount
            ]);
        }

        return DBConn::resp(); 
    }

    public function set_employee_coe() {
        $emp = DBConn::select('supports', 
            'name, datestarted, lastday, position ',
        ['id' => $_POST['id']]);

        $_SESSION['name'] = $emp[0]['name'];
        $_SESSION['datestarted'] = $emp[0]['datestarted'];
        $_SESSION['lastday'] = $emp[0]['lastday'];
        $_SESSION['position'] = $emp[0]['position'];
    }

    public function user_type() {
        if ($_POST['type'] == 'user') {
            return json_encode(DBConn::select('users')); 
        }
        return json_encode(DBConn::select('walkin')); 
    }
}