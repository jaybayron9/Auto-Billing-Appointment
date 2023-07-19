<?php

namespace userData;

use DBConn\DBConn;

class User extends DBConn {
    public function user_add_appointment() {
        extract($_POST);

        DBConn::insert('appointments', [
            'client_id' => $user_id,
            'car_id' => $car_id,
            'pms' => $pms,
            'repair' => $repair,
            'status' => 'pending',
            'schedule' => $schedule
        ]);

        $_SESSION['alert'] = 'Appointment created successfully.';
        return parent::resp();
    }

    public function user_cancel_appointment() {
        extract($_POST);

        parent::update('appointments', [
            'status' => 'cancelled',
        ], "id = $id"); 
        
        return parent::resp();
    }
}