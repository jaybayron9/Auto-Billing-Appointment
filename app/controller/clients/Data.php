<?php 

namespace Data;
use DBConn\DBConn; 

class Data extends DBConn {
    public function show_support() { 
        $data = parent::select('supports', '*', ['id' => $_POST['id']], null, 1);

        return json_encode([
            'status' => 200, 
            'id' => $data[0]['id'],
            'name' => $data[0]['name'],
            'gender' => $data[0]['gender'],
            'dateofbirth' => $data[0]['dateofbirth'],
            'placeofbirth' => $data[0]['placeofbirth'],
            'nationality' => $data[0]['nationality'],
            'position' => $data[0]['position'],
            'datestarted' => $data[0]['datestarted'],
            'address' => $data[0]['address'],
            'mobile_no' => $data[0]['mobile_no'],
            'email' => $data[0]['email'],
        ]); 
    }

    public function update_support() {
        extract($_POST); 
        parent::update('supports', [
            'name' => $name,
            'gender' => $gender,
            'dateofbirth' => $dateofbirth,
            'placeofbirth' => $placebirth,
            'nationality' => $nationality,
            'position' => $position,
            'datestarted' => $datestarted,
            'address' => $address,
            'mobile_no' => $mobile_no,
            'email' => $email, 
        ], "id = '{$emp_id}'"); 
        return parent::resp();
        // return self::show_support();
    }

    public function resign_support() {
        parent::update('supports', [
            'status' => 'Resigned',
            'lastday' => date("F j, Y")
        ], "id = '{$_POST['id']}'");

        return json_encode([
            'status' => 200,
            'id' => $_POST['id']
        ]);
    }

    public function add_support() { 
        extract($_POST); 

        $pass_validator = new \Password\Password;
        $pass_validator->set_error();
        if (!empty(array_filter($pass_validator->err))) {
            return $pass_validator->get_error();
        }

        parent::insert('supports', [
            'name' => $name,
            'gender' => $gender,
            'dateofbirth' => $dateofbirth,
            'placeofbirth' => $placebirth,
            'nationality' => $nationality,
            'position' => $position,
            'datestarted' => $datestarted,
            'address' => $address,
            'mobile_no' => $mobile_no,
            'email' => $email, 
            'password' => password_hash($password, PASSWORD_BCRYPT), 
        ]);

        $_SESSION['alert'] = 'Employee successfully added.';
        return parent::resp();
    }

    public function delete_supports() { 
        if (empty($_POST['data']) || empty($_POST['data'][0])) {
            return parent::resp(400);
        }

        foreach($_POST['data'] as $id) {
            parent::delete('supports', ['id' => $id]);
        }

        return parent::resp();
    }

    public function show_user() { 
        $data = parent::select('users', '*', ['id' => $_POST['id']], null, 1);

        return json_encode([
            'status' => 200,
            'id' => $data[0]['id'],
            'name' => $data[0]['name'],
            'phone' => $data[0]['phone'],
            'email' => $data[0]['email'],
            'created' => $data[0]['created_at'],
            'access' => $data[0]['access_enabled'],
        ]); 
    }

    public function update_user() {
        parent::update('users', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'access_enabled' => $_POST['access'],
        ], "id = '{$_POST['id']}'");

        return self::show_user();
    }

    public function delete_user() {
        parent::delete('users', ['id' => $_POST['id']]);
        return json_encode([
            'status' => 200,
            'id' => $_POST['id']
        ]);
    } 

    public function delete_users() { 
        if (empty($_POST['data']) || empty($_POST['data'][0])) {
            return parent::resp(400);
        }

        foreach($_POST['data'] as $id) {
            parent::delete('users', ['id' => $id]);
        }

        return parent::resp();
    }

    public function unset_alert() {
        unset($_SESSION['alert']);
        unset($_SESSION['access_denied']);
    }
}