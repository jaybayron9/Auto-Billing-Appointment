<?php 

class Client extends DBConn {
    public function client_add_appointment() {
        extract($_POST);

        parent::insert('appointments', [
            'client_id' => $user_id,
            'car_id' => $car_id,
            'pms' => $pms,
            'repair' => $repair,
            'status' => 'pending',
            'schedule' => $schedule
        ]);

        echo 'Appointment added.';
    }

    public function add_car() {
        extract($_POST);

        if (preg_match("/^[A-Za-z]{3}[-\s]?\d{4}$/", $plateNumber)) {
            parent::insert('cars', [
                'user_id' => $user_id,
                'plate_no' => $plateNumber,
                'car_brand' => $brand,
                'car_model' => $carModel,
                'car_type' => $carType,
                'fuel_type' => $fuelType,
                'color' => $carColor,
                'trans_type' => $transType,
            ]);

            return parent::alert('success', 'Car added.');
        }

        return parent::alert('error', 'Please fill out all the field with correct format.');
        // return parent::alert('error', 'Car already exist.');
    }
}