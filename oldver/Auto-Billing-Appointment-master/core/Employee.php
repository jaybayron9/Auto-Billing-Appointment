<?php 

class Employee extends DBConn {
    public function update_status() {
        extract($_POST);

        parent::update('appointments', [
            'status' => $status
        ], "id = $id");

        $info = parent::select('appointments', '*', ['id' => $id]);

        $schedule = date('F d, Y h:i a', strtotime($info[0]['schedule']));

        parent::insert('convo', [
            'from_user' => 'admin1',
            'send_to' => $info[0]['client_id'],
            'message' => "Your appointment {$schedule} has been in progress."
        ]);

        echo 'Employee status updated.';
    }
} 