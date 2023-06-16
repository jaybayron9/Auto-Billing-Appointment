<?php 

class Admin extends DBConn {
    public function add_employee() {
        extract($_POST);

        $insert = parent::insert('employee_info', [
            'employee_no' => $emp_no,
            'name' => $fullname,
            'address' => $address,
            'password' => $password,
            'email' => $email,
            'gender' => $gender,
            'dateofbirth' => $datebirth,
            'position' => $position,
            'age' => $age,
            'placeofbirth' => $placebirth,
            'datestarted' => $datestarted,
            'mobile_no' => $number,
        ]);

        echo !$insert ? 'Employee Added!' : 'error';
    }
}