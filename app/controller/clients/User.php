<?php

namespace userData;

use DBConn\DBConn;

class User extends DBConn {
    public function book_appointment() { 
        DBConn::insert('appointments', [
            'user_id' => $_POST['user_id'],
            'car_id' => $_POST['car_id'], 
            'service_type_id' => $_POST['service'],
            'schedule_date' => $_POST['schedule_date'], 
            'service_time_id' => $_POST['time'],   
        ]); 

        $app_id = DBConn::select('appointments', 'id', [
            'user_id' => $_POST['user_id'],
            'car_id' => $_POST['car_id'], 
            'schedule_date' => $_POST['schedule_date'], 
            'service_time_id' => $_POST['time'], 
        ]); 

        DBConn::insert('booking_summary', [
            'user_id' => $_POST['user_id'],
            'car_id' => $_POST['car_id'],
            'appointment_id' =>  $app_id[0]['id']
        ]); 

        $summary = DBConn::select('booking_summary','id', [
            'appointment_id' =>  $app_id[0]['id']
        ]);

        DBConn::update('appointments', [
            'book_summary_id' =>  $summary[0]['id']
        ], "id = '{$app_id[0]['id']}'"); 

        $_SESSION['alert'] = 'Appointment created successfully.';
        return parent::resp();
    }

    public function user_cancel_appointment() { 
        parent::update('appointments', [
            'appointment_status' => 'Cancelled',
        ], "id = '{$_POST['id']}'"); 
        return parent::resp();
    }

    public function add_car() {
        extract($_POST);
        if (preg_match("/^[A-Za-z]{3}[-\s]?\d{4}$/", $plateNumber)) {
            $cars = DBConn::select('cars', '*', ['user_id' => $_SESSION['user_id'], 'plate_no' => $plateNumber]);
            if (count($cars) < 1) {
                DBConn::insert('cars', [
                    'user_id' => $user_id,
                    'plate_no' => $plateNumber,
                    'car_brand' => $brand,
                    'car_model' => $carModel,
                    'car_type' => $carType,
                    'fuel_type' => $fuelType,
                    'color' => $carColor,
                    'trans_type' => $transType,
                ]);
                $_SESSION['alert'] = 'Car successfully added.';
                return parent::resp(200, 'Car added.');
            }
            return parent::resp(400, 'You already register this car.');
        }
        return parent::resp(400, 'Invalid plate number format.');
    }

    public function show_mycar() {
        return json_encode(parent::select('cars', '*', ['id' => $_POST['id']]));
    }

    public function update_mycar() {
        extract($_POST);
        if (preg_match("/^[A-Za-z]{3}[-\s]?\d{4}$/", $plateNumber)) { 
            DBConn::update('cars', [ 
                'car_brand' => $brand,
                'car_model' => $carModel,
                'car_type' => $carType,
                'fuel_type' => $fuelType,
                'color' => $carColor,
                'trans_type' => $transType,
            ], "id = $car_id");
            return parent::resp(200, 'Car successfully update.');  
        }
        return parent::resp(400, 'Please fill out all the field with correct format.');
    }

    public function delete_mycar() {
        $id = isset($_GET['car_id']) ? $_GET['car_id'] : '0';
        parent::delete('cars', ['id' => $id], 1); 
        $_SESSION['alert'] = 'Car successfully removed.';
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}