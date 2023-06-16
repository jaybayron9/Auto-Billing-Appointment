<?php 

class Employee extends DBConn {
    public static function fetchEmployee() {
        return parent::$conn->query("SELECT * FROM employee_info");
    }
}