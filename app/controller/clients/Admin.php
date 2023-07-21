<?php 

namespace Data\Admin; 
use DBConn\DBConn;

class Admin extends DBConn {
    public function appointment_status() { 
        parent::update('appointments',[
            'status' => $_POST['status']
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
        extract($_POST);

        parent::update('appointments', [
            'emp_id' => $mechanic . ', ' . $electrician
        ], "id = $app_id");

        return parent::resp();
    }

    public function create_walkin() {
        extract($_POST);

        parent::insert('walkin', [
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'repair' => $repair,
            'brand' => $brand,
            'model' => $model,
            'schedule' => $schedule,
            'phone' => $phone,
        ]);

        echo 'Walkin added.';
    }
}