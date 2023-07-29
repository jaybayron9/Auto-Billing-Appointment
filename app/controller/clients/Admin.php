<?php 

namespace Data\Admin; 
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
        parent::update('appointments',[
            'appointment_status' => $_POST['status']
        ], "id = '{$_POST['id']}'");

        return parent::resp(200, ' ');
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
}