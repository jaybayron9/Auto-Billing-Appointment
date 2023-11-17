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
            'service_time_id' => $_POST['time']
            // 'pms_package' => isset($_POST['pms']) ? implode(', ', $_POST['pms']) : 0
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

    public function my_appointments() {
        $result = parent::DBQuery("SELECT ap.id as app_id, ap.*, cs.*, sv.*, bh.*
                FROM appointments ap 
                    JOIN cars cs ON ap.car_id = cs.id
                    JOIN services sv ON sv.id = ap.service_type_id
                    JOIN bussiness_hours bh ON bh.id = ap.service_time_id
                WHERE 
                    ap.user_id = '{$_SESSION['user_id']}'
                ORDER BY ap.created_at DESC");
        return json_encode($result);
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
            $_SESSION['alert'] = 'Car successfully updated.';
            return parent::resp(200);  
        }
        return parent::resp(400, 'Please fill out all the field with correct format.');
    }

    public function delete_mycar() {
        $id = isset($_GET['car_id']) ? $_GET['car_id'] : '0';
        parent::delete('cars', ['id' => $id], 1); 
        $_SESSION['alert'] = 'Car successfully removed.';
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public function show_service_package() {
        header('Content-Type: application/json');
        $id = $_GET['id'];

        $estimator = DBConn::select('estimator', '*', ['id' => $id]);
        $inclusions = array_filter(explode(',', $estimator[0]['inclusions']));

        return json_encode([ 
            'estimator' => $estimator, 
            'inclusions' => $inclusions
        ]);
    }

    public function show_pms_package() { 
        $cars = DBConn::select('cars', '*', ['id' => $_POST['car_id']]);   

        $package = ($cars[0]['fuel_type'] == 'Diesel') 
            ? DBConn::select('estimator', 'name, price, mileage', ['car_type' => 2, 'service' => 1])
            : DBConn::select('estimator', 'name, price, mileage', ['car_type' => 1, 'service' => 1]); 
        
        return json_encode([
            'package' => $package
        ]);
    }
}