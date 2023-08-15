<?php 

namespace Client;
use Emailer;
use Auth\Auth;
use DBConn\DBConn;
use Validation\Valid;
use FHandler\FHandler;

class User extends DBConn {
    public function sign_in() {   
        $msg = 'Incorrect email or password'; 
        $error[] = Auth::check_csrf($_POST['csrf_token']) ? $msg : '';  
        $error[] = Auth::check_empty($_POST) ? 'Please fill out the required fields' : '';

        if (!empty(array_filter($error))) {
            return json_encode([
                'status' => 'error',
                'msg' => $error[0], 
                'empty' => $error[1]
            ]);
        }

        $userTbl = parent::select('users','id, email, password, account_role', ['email' => $_POST['email']], null, 1);
        $supportTbl = parent::select('supports','id, email, password, account_role', ['email' => $_POST['email']], null, 1);
        $adminTbl = parent::select('admins','id, email, password, account_role', ['email' => $_POST['email']], null, 1);

        foreach ($userTbl as $v) { 
            if ($_POST['email'] === $v['email'] && password_verify($_POST['password'], $v['password'])) {
                isset($_POST['remember']) ?? setcookie('admin_id', $v['id'], time() + 30 * 24 * 60 * 60);
                
                $_SESSION['user_id'] = $v['id'];
                return parent::resp(200, 'User');
            }
        }

        foreach ($supportTbl as $v) { 
            if ($_POST['email'] === $v['email'] && password_verify($_POST['password'], $v['password'])) {
                isset($_POST['remember']) ?? setcookie('support_id', $v['id'], time() + 30 * 24 * 60 * 60);
                
                $_SESSION['support_id'] = $v['id'];
                return parent::resp(200, 'Support');
            }
        }

        foreach ($adminTbl as $v) { 
            if ($_POST['email'] === $v['email'] && password_verify($_POST['password'], $v['password'])) {
                isset($_POST['remember']) ?? setcookie('admin_id', $v['id'], time() + 30 * 24 * 60 * 60);
                
                $_SESSION['admin_id'] = $v['id'];
                return parent::resp(200, 'Admin');
            }
        }

        return parent::resp(400, $msg);
    }

    public function sign_out() {
        if (isset($_COOKIE['user_id'])) {
            setcookie('user_id', '', time() - 3600);
        }

        Auth::sign_out();
    }

    public function sign_up() {   
        $error[] = Auth::check_csrf($_POST['csrf_token']) ? 'Invalid email address.' : '';
        $error[] = Auth::empty($_POST['name']) ? 'Name field is required' : '';
        $error[] = Auth::empty($_POST['email']) ? 'Email field is required' : '';
        $error[] = Auth::check_email($_POST) ? 'Invalid email address.' : '';
        $error[] = Auth::check_similar_email('users', $_POST['email']) ? 'The email has already been taken.' : '';
        $error[] = Auth::empty($_POST['phone']) ? 'Phone number field is required' : '';
        $error[] = Valid::has_exact_no($_POST['phone']) ? 'Phone number is atleast 11 characters' : '';
        $error[] = Auth::empty($_POST['password']) ? 'Password field is required' : '';
        $error[] = Valid::has_min_lenght($_POST['password']) ? '8 Characters' : '';
        $error[] = Valid::has_small_letters($_POST['password']) ? 'Small Letter' : '';
        $error[] = Valid::has_big_letters($_POST['password']) ? 'Big Letter' : '';
        $error[] = Valid::has_numbers($_POST['password']) ? 'Number' : '';
        $error[] = Valid::has_special_characters($_POST['password']) ? 'Special Character' : '';
        $error[] = Auth::confirm_password($_POST['password'], $_POST['password_confirmation']) ? 'Password do not match.' : '';
        $error[] = Auth::empty($_POST['platenumber']) ? 'Plate number field is required.' : '';
        $error[] = Valid::is_plate_num($_POST['platenumber']) ? 'Invalid plate number format.' : '';
        $error[] = Auth::is_plate_exist($_POST['platenumber']) ? 'Plate number is already exist.' : '';
        $error[] = Auth::empty($_POST['brand']) ? 'Brand field is required' : '';
        $error[] = Auth::empty($_POST['model']) ? 'Model field is required' : '';
        $error[] = Auth::empty($_POST['cartype']) ? 'Car type field is required' : ''; 
        $error[] = Auth::empty($_POST['fueltype']) ? 'Fuel type field is required' : '';
        $error[] = Auth::empty($_POST['transmission']) ? 'Transmission field is required' : '';
        $error[] = Auth::empty($_POST['color']) ? 'Color field is required' : '';

        if (!empty(array_filter($error))) {
            return json_encode([
                'status' => 400, 
                'csrf'=> $error[0],
                'name' => $error[1],
                'email' => $error[2],
                'invalid_email' => $error[3],
                'similar_email' => $error[4],
                'phone' => $error[5],
                'char_phone' => $error[6],
                'password' => $error[7],
                'pass_lenght' => $error[8],
                'pass_small' => $error[9],
                'pass_big' =>  $error[10],
                'pass_number' => $error[11], 
                'pass_symbol' => $error[12], 
                'confirm_password' => $error[13], 
                'plate_no' => $error[14],
                'plate_no_format' => $error[15],
                'similar_plate_no' => $error[16],
                'brand' => $error[17],
                'model' => $error[18],
                'cartype' => $error[19],
                'fueltype' => $error[20],
                'transmission' => $error[21],
                'color' => $error[22]
            ]);
        }

        parent::insert('users', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT), 
        ]);

        $id = parent::select('users', 'id', ['email' => $_POST['email']], null, 1); 
        parent::insert('cars', [
            'user_id' => $id[0]['id'], 
            'plate_no'=> $_POST['platenumber'],
            'car_brand' => $_POST['brand'],
            'car_model' => $_POST['model'],
            'car_type' => $_POST['cartype'],
            'fuel_type' => $_POST['fueltype'],
            'color' => $_POST['color'],
            'trans_type' => $_POST['transmission']
        ]); 

        $_SESSION['user_id'] = $id[0]['id']; 

        return parent::resp();
    }

    public function send_verification_email() {
        if (isset($_SESSION['user_id'])) {
            $email = parent::select('users', '*', ['id' => $_SESSION['user_id']], null, 1);

            $token = bin2hex(random_bytes(32));
            $config = require('config.php'); 
            extract($config['links']);

            $url = $base_url . '/?vs=_/&token=' . $token;

            $mailer = new EMailer();
            $mailer->send($email[0]['email'], 'Account Verification', $mailer->email_ver_temp($url));

            parent::update('users', [
                'email_verify_token' => $token
            ], "id = '{$_SESSION['user_id']}'");

            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
    }

    public function similar_email() {
        extract($_POST);
        echo Auth::check_email($_POST) ? 'Invalid email address.' : '';
        echo Auth::check_similar_email('users', $email) ? 'The email has already been taken.' : '';
    }

    public function pass_request() { 
        if (!Auth::check_empty($_POST)) {
            $user = parent::select('users', '*', ['email' => $_POST['email']], null, 1);
            $support = parent::select('supports', '*', ['email' => $_POST['email']], null, 1);
            $admin = parent::select('admins', '*', ['email' => $_POST['email']], null, 1);

            $send = function($token, $user = '') {
                $config = require('config.php'); 
                extract($config['links']); 
                $url = $base_url . '/?vs=reset_password&token=' . $token; 
                $mailer = new EMailer();
                $send = $mailer->send($_POST['email'], "$user Password Reset Link", $mailer->forgot_temp($url));
                if ($send) {
                    return parent::resp(200, 'We have emailed your password reset link!'); 
                }
            };

            $token = bin2hex(random_bytes(32));

            if (count($user) > 0) { 
                parent::update('users', [
                    'password_reset_token' => $token,
                ], "email = '{$_POST['email']}'");
                return $send($token, 'Customer');
            }

            if (count($support) > 0) { 
                parent::update('supports', [
                    'password_reset_token' => $token,
                ], "email = '{$_POST['email']}'");
                return $send($token, 'Employee'); 
            }

            if (count($admin) > 0) { 
                parent::update('admins', [
                    'password_reset_token' => $token,
                ], "email = '{$_POST['email']}'");
                return $send($token, 'Admin');
            }
            return parent::resp(400, 'We can\'t find a user with that email address.');
        }  
        return parent::resp(400, 'The Email field is required.');
    }

    public function reset_password() {
        Auth::check_csrf($_POST['csrf_token']); 
        
        if (!Auth::check_empty($_POST)) {
            $validate = function($arr, $table) { 
                if ($_POST['password'] === $_POST['password_confirmation']) {
                    parent::update($table, [
                        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                    ], "id = '{$arr[0]['id']}'");
                    return parent::resp(200, 'Your password has been changed.');
                }
                return parent::resp(400, 'Password does not match.'); 
            };

            $account = function($table) {
                return parent::select($table, 'id', [
                    'email' => $_POST['email'], 
                    'password_reset_token' => $_POST['token'],
                ], null, 1);
            }; 

            $pass_validator = new \Password\Password;
            $pass_validator->set_error();
            if (!empty(array_filter($pass_validator->err))) {
                return $pass_validator->get_error();
            }

            $user = $account('users'); 
            $support = $account('supports'); 
            $admin = $account('admins');

            if (count($user) > 0) { return $validate($user, 'users'); }
            if (count($support) > 0) { return $validate($support, 'supports'); }
            if (count($admin) > 0) { return $validate($admin, 'admins'); }
            return parent::resp(400, 'Email address does not match.');
        }
        return parent::resp(400, 'Please fill out the required fields.');
    }

    public function update_profile() {
        $error[] = Auth::check_csrf($_POST['csrf_token']) ? '403 (Forbidden)' : '';
        $error[] = Auth::empty($_POST['email']) ? 'The email field is required.' : '';
        $error[] = Auth::empty($_POST['name']) ? 'The name field is required.' : '';
        $error[] = Auth::empty($_POST['phone']) ? 'The phone field is required.' : ''; 

        if (!empty(array_filter($error))) {
            return json_encode([
                'status' => 400,
                'email' => $error[1],
                'name' => $error[2],
                'phone' => $error[3],
            ]);
        } 

        DBConn::update('users', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
        ], "id = '{$_POST['id']}'");

        if (!Auth::valImage()) { 
            $del = DBConn::select('users', '*', ['id' => $_POST['id']], null, 1);
            FHandler::delete_image($del[0]['profile_photo_path']);
            DBConn::update('users', [
                'profile_photo_path' => FHandler::upload_image('uploads'),
            ], "id = '{$_POST['id']}'");
        }

        return parent::resp(200, 'Saved.');
    }

    public function update_password() {
        $error[] = Auth::check_csrf($_POST['csrf_token']) ? '403 (Forbidden)' : '';
        $error[] = Auth::empty($_POST['current_password']) ? 'The current password field is required.' : '';
        $error[] = Auth::compare_password('users', $_POST['id'], $_POST['current_password']) ? 'The provided password does not match your current password.' : '';
        $error[] = Auth::empty($_POST['new_password']) ? 'The new password field is required.' : '';
        $error[] = Auth::pass_length($_POST['new_password'], 7) ? 'The password must be at least 8 characters.' : '';
        $error[] = Auth::confirm_password($_POST['new_password'], $_POST['confirm_password']) ? 'The password confirmation does not match.' : ''; 

        if (!empty(array_filter($error))) {
            return json_encode([
                'status' => 400,
                'current_password' => $error[1],
                'old_pass_confirmation' => $error[2],
                'new_password' => $error[3],
                'pass_length' => $error[4], 
                'password_confirmaton' => $error[5]
            ]);
        }

        DBConn::update('users', [
            'password' => password_hash($_POST['new_password'], PASSWORD_BCRYPT),
        ], "id = '{$_POST['id']}'");

        return parent::resp();
    }

    public function delete_account() {
        $error[] = Auth::check_csrf($_POST['csrf_token']) ? '403 (Forbidden)' : '';
        $error[] = Auth::compare_password('users', $_POST['id'], $_POST['password']) ? 'Incorrect password' : '';

        if (!empty(array_filter($error))) {
            return parent::resp(400, $error[1]);
        }

        DBConn::delete('users', ['id' => $_POST['id']], 1);
        
        unset($_SESSION['user_id']); 
        session_write_close();

        $_SESSION['alert'] = 'Account successfully deleted.';
        return parent::resp();
    }

    public function password_validation() {
        $error[] = Valid::has_min_lenght($_POST['password']) ? '8 Characters' : '';
        $error[] = Valid::has_small_letters($_POST['password']) ? 'Small Letter' : '';
        $error[] = Valid::has_big_letters($_POST['password']) ? 'Big Letter' : '';
        $error[] = Valid::has_numbers($_POST['password']) ? 'Number' : '';
        $error[] = Valid::has_special_characters($_POST['password']) ? 'Special Character' : ''; 

        if (!empty(array_filter($error))) {
            return json_encode([
                'lenght' => $error[0],
                'small' => $error[1],
                'big' =>  $error[2],
                'number' => $error[3],
                'symbol' => $error[4]
            ]);
        }

        return json_encode([
            'lenght' => '',
            'small' => '',
            'big' => '',
            'number' => '',
            'symbol' => ''
        ]); 
    } 
}