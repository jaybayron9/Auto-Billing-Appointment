<?php 

class Admin extends DBConn {
    public function add_employee() {
        extract($_POST);

        $insert = parent::insert('employees', [
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
            'name' => $new_name,
            'address' => $new_address,
            'password' => $new_password,
            'email' => $new_email,
            'gender' => $new_age,
            'position' => $new_position,
            'dateofbirth' => $new_birth,
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

    public function accept_appointment() {
        extract($_POST);

        parent::update('appointments', [
            'status' => 'accepted',
        ], "id = $id");

        $info = parent::select('appointments', '*', ['id' => $id]);

        $schedule = date('F d, Y h:i a', strtotime($info[0]['schedule']));

        parent::insert('convo', [
            'from_user' => 'admin1',
            'send_to' => $info[0]['client_id'],
            'message' => "Your appointment for {$schedule} has been approved."
        ]);

        echo 'Appointment marked Accepted.';
    }

    public function cancel_appointment() {
        extract($_POST);

        parent::update('appointments', [
            'status' => 'cancelled',
        ], "id = $id");

        echo 'Appointment marked cancelled.';
    }

    public function assign_appointment() {
        extract($_POST);

        parent::update('appointments', [
            'emp_id' => $mechanic . ', ' . $electrician,
            'description' => $description,
        ], "id = $app_id");
    }

    public function add_payment() {
        extract($_POST);

        parent::insert('payments', [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'description' => $description,
            'total_due' => $amount
        ]);

        echo 'Payment added.';
    }

    public function users_payment() {
        extract($_POST);

        $data = explode('  |  ', $name);

        $user = parent::select('clients', '*', ['id' => $data[0]]);

        foreach ($user as $users) {
            parent::insert('payments', [
                'name' => $data[1],
                'description' => $description,
                'email' => $users['email'],
                'phone' => $users['phone'],
                'total_due' => $amount
            ]);
        }

        parent::update('appointments', [
            'price' => $amount,
        ], "id = {$data[0]}");

        echo 'Payment added.';
    }

    public function delete_payment() {
        extract($_POST);

        parent::DBQuery("DELETE FROM payments WHERE id = '{$id}'");

        echo 'Payment deleted.';
    }

    public function delete_user() { 
        extract($_POST);

        parent::DBQuery("DELETE FROM payments WHERE id = '{$id}'");

        echo 'User successfully deleted.';
    }

    public function add_walkin() {
        extract($_POST);

        parent::insert('walkin', [
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'repair' => $repair,
            'brand' => $brand,
            'model' => $model,
            'schedule' => $schedule,
            'phone' => $phone,
        ]);

        echo 'Walkin added.';
    }

    public function delete_walkin() {
        extract($_POST);

        parent::DBQuery("DELETE FROM walkin WHERE id = '{$id}'");

        echo 'Walkin successfully deleted.';
    }
}