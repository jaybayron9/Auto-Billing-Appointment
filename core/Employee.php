<?php 

class Employee extends DBConn {
    public static function fetchEmployee() {
        return parent::$conn->query("SELECT * FROM employee_info");
    }

    public function add_employee() {
        extract($_POST);

        $insert = parent::$conn->query("
            INSERT INTO employee_info
                (employee_no, name, address, password, email, gender, dateofbirth, position, age, placeofbirth, datestarted, mobile_no)
            VALUES ('{$emp_no}', '{$fullname}', '{$address}', '{$password}', '{$email}', '{$gender}', '{$datebirth}', '{$position}', '{$age}', '{$placebirth}', '{$datestarted}', '{$number}')
        ");

        echo $insert ? 'Employee Added!' : 'error';
    }
}