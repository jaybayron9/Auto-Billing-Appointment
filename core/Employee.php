<?php 

class Employee extends DBConn {
    public function update_status() {
        extract($_POST);

        parent::update('appointments', [
            'status' => $status
        ], "id = $id");

        echo 'Employee status updated.';
    }
}