<?php 

class Auth extends DBConn {
    public function login() {
        extract($_POST);

        $admin = parent::$conn->query("SELECT * FROM admin_info WHERE email = '{$email}' AND password = '{$password}' LIMIT 1");
        $employee = parent::$conn->query("SELECT * FROM employee_info WHERE email = '{$email}' AND password = '{$password}' LIMIT 1");
        $client = parent::$conn->query("SELECT * FROM client_info WHERE email = '{$email}' AND password = '{$password}' LIMIT 1");

        if ($admin->num_rows > 0) {
            $_SESSION['admin_auth'] = mysqli_fetch_array($admin)['id'];
            echo 'go_to_admin';
            
        } else if ($employee->num_rows > 0) {
            $_SESSION['employee_auth'] = mysqli_fetch_array($employee)['id'];
            echo 'go_to_employee';

        } else if ($client->num_rows > 0) {
            $_SESSION['client_auth'] = mysqli_fetch_array($client)['id'];
            echo 'go_to_client';
            
        } 

        $_SESSION['email_auth'] = $email;
        return false;
    }

    public function register() {
        
    }

    public function logout() {
        unset($_SESSION['client_auth']);
    }
}