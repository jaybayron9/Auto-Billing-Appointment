<?php 

class Auth extends DBConn {
    public function login() {
        extract($_POST);

        $admin = parent::select('administrators', '*', ['email' => $email, 'password' => $password], null, 1);
        $employee = parent::select('employees', '*', ['email' => $email, 'password' => $password], null, 1);
        $client = parent::select('clients', '*', ['email' => $email, 'password' => $password], null, 1);

        if (count($admin) > 0) {
            $_SESSION['admin_auth'] = $admin[0]['id'];
            echo 'go_to_admin';
            
        } else if (count($employee) > 0) {
            $_SESSION['employee_auth'] = $employee[0]['id'];
            echo 'go_to_employee';

        } else if (count($client) > 0) {
            $_SESSION['client_auth'] = $client[0]['id'];
            echo 'go_to_client';
        } 

        $_SESSION['email_auth'] = $email;
        return false;
    }

    public function register() {
        extract($_POST);

        $checkEmail = parent::select('clients', '*', ['email' => $email], null, 1);

        if (count($checkEmail) > 0) {
            return parent::alert('error', 'Email is already registered.');
        } else if (strlen($phone) == 11 && preg_match("/^[A-Za-z]{3}[-\s]?\d{4}$/", $plateNumber) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/", $password) && $password == $repassword && strlen($password) > 7) {
            $client = parent::insert('clients', [
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'password' => $password
            ]);

            if (!$client) {
                $id = parent::select('clients', 'id', ['email' => $email, 'password' => $password], null, 1);
                parent::insert('cars', [
                    'user_id' => $id[0]['id'],
                    'plate_no' => $plateNumber,
                    'car_brand' => $brand,
                    'car_model' => $carModel,
                    'car_type' => $carType,
                    'fuel_type' => $fuelType,
                    'color' => $carColor,
                    'trans_type' => $transType,
                ]);

                $_SESSION['client_auth'] = $id[0]['id'];
                $_SESSION['email_auth'] = $email;
                return parent::alert('success', 'Successfully Registered!');
            }

            return parent::alert('error', 'Error, Please try again.');
        } 
        return parent::alert('error', 'Please enter a valid format foreach field.');
    }

    public function logout() {
        unset($_SESSION['client_auth']);
    }
}