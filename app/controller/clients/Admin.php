<?php 

namespace Data\Admin; 
use Convo\Convo;
use DBConn\DBConn;

class Admin extends DBConn {
    public function todays_appointments() {
        $result = parent::DBQuery("SELECT ap.id as app_id, ap.*, cs.*, sv.*, bh.*
                FROM appointments ap 
                    JOIN cars cs ON ap.car_id = cs.id
                    JOIN services sv ON sv.id = ap.service_type_id
                    JOIN bussiness_hours bh ON bh.id = ap.service_time_id
                WHERE 
                    ap.schedule_date >= CURRENT_DATE AND
                    (ap.appointment_status != 'Cancelled' OR
                    ap.appointment_status != 'Done')
                ORDER BY schedule_date asc");
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
            'from_user' => '1',
            'send_to' => $_POST['user_id'],
            'message' => $_POST['message']
        ]);

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
        if ($type == 'user') {  
            $data = explode('  |  ', $name);
            $user = DBConn::select('users', '*', ['id' => $data[0]]);

            foreach ($user as $users) {
                DBConn::insert('payments', [
                    'name' => $data[1],
                    'email' => $users['email'],
                    'phone' => $users['phone'],
                    'description' => "(User) $description",
                    'total_due' => $amount
                ]);
            }

            DBConn::update('appointments', [
                'payment_status' => 'Paid',
            ], "id = {$data[0]}");

            return DBConn::resp(); 
        } else {
            DBConn::insert('payments', [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'description' => "(Walkin) $description",
                'total_due' => $amount
            ]);
        }

        $_SESSION['alert'] = 'Payment successfully added.'; 
    }
}