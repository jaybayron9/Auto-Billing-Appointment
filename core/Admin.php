<?php 

class Admin extends DBConn {
    public function add_employee() {
        extract($_POST);

        $insert = parent::insert('employees', [
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

    public function get_employee() { return json_encode(parent::findOrFail('employees', $_POST['id'])); }

    public function update_employee() {
        extract($_POST);
        
        $update = parent::update('employees', [
            'employee_no' => $new_emp_no,
            'name' => $new_name,
            'address' => $new_address,
            'password' => $new_password,
            'email' => $new_email,
            'gender' => $new_age,
            'position' => $new_position,
            'placeofbirth' => $new_birth,
            'datestarted' => $new_started,
            'mobile_no' => $new_number,
        ], "id = $emp_id");

        return $update ? parent::alert('success', 'Employee Updated!') : parent::alert('error', 'There\'s a problem updating the employee.');
    }

    public function resign_employee() {
        extract($_POST);

        parent::update('employees', [
            'status' => 'resign',
        ], "id = $id");

        echo 'Employee Resigned!';
    }
}