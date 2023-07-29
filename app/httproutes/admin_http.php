<?php   

use Data\Admin\Admin;

$admin_response = [
    'todays_appointments' => ['obj'=> new Admin(), 'method' => 'todays_appointments'],
    'appointment_status' => ['obj'=> new Admin(), 'method' => 'appointment_status'],
    'send_msg' => ['obj'=> new Admin(), 'method' => 'send_msg'],
    'assign_employee' => ['obj'=> new Admin(), 'method' => 'assign_employee'], 
    'create_walkin' => ['obj'=> new Admin(), 'method' => 'create_walkin'],  
    'cancel_walkin' => ['obj'=> new Admin(), 'method' => 'cancel_walkin'],  
]; 

HTTPR(strtolower($_GET['admin_rq'] ?? ''), $admin_response);