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
            'status' => 'Pending',
            'schedule' => $schedule
        ]);

        $_SESSION['alert'] = 'Appointment created successfully.';
        return parent::resp();
    }

    public function user_cancel_appointment() {
        extract($_POST);

        parent::update('appointments', [
            'status' => 'Cancelled',
        ], "id = $id"); 
        
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
                return parent::resp(200, 'Car added.');
            }
            return parent::resp(400, 'You already registered this car.');
        }
        return parent::resp(400, 'Please fill out all the field with correct format.');
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
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}