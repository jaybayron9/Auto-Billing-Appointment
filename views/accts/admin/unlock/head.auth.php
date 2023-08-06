<?php 
use DBConn\DBConn;
use Auth\Auth;

Auth::check_user_auth(
    'admin_id', 'login'
);

$conn = new DBConn();
$admin_info = DBConn::select('admins', '*', [
        'id' => $_SESSION['admin_id']
    ], null, 1);

$category = function($get) {   
    $result = '';
    if ($get == '_admin/pro1diesel' || '_admin/pro1gas') { $result = '1'; }
    if ($get == '_admin/pro2') { $result = '2'; }
    if ($get == '_admin/pro3') { $result = '3'; }
    if ($get == '_admin/pro4') { $result = '4'; } 
    return $result;
};

$type = function($get) {
    return $get == '_admin/pro1diesel' ? '2' : '1';
};