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

            $cars = parent::select('cars', '*', ['user_id' => $_SESSION['client_auth'], 'plate_no' => $plateNumber]);

            if (count($cars) < 1) {
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
            return parent::alert('error', 'You already registered this car.');
        }

        return parent::alert('error', 'Please fill out all the field with correct format.');
    }

    public function client_cancel_appointment() {
        extract($_POST);

        parent::update('appointments', [
            'status' => 'cancelled',
        ], "id = $id");

        echo 'Appointment marked as cancelled.';
    }

    public function send_email() {
        $email = new Emailer();

        extract($_POST);

        $send = Emailer::send('tatcojeth1018@gmail.com', $email, $message);
    }
}   