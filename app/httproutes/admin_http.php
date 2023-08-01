<?php   

use PDF\PDF;
use Data\Admin\Admin;

$admin_response = [
    'todays_appointments' => ['obj'=> new Admin(), 'method' => 'todays_appointments'],
    'appointment_status' => ['obj'=> new Admin(), 'method' => 'appointment_status'],
    'send_msg' => ['obj'=> new Admin(), 'method' => 'send_msg'],
    'assign_employee' => ['obj'=> new Admin(), 'method' => 'assign_employee'], 
    'create_walkin' => ['obj'=> new Admin(), 'method' => 'create_walkin'],  
    'cancel_walkin' => ['obj'=> new Admin(), 'method' => 'cancel_walkin'],  
    'user_type' => ['obj'=> new Admin(), 'method' => 'user_type'],  
    'customer_payment' => ['obj'=> new Admin(), 'method' => 'customer_payment'],  
    'set_employee_coe' => ['obj'=> new Admin(), 'method' => 'set_employee_coe'],  
    'coe' => ['obj'=> new PDF(), 'method' => 'coe'],  
]; 

HTTPR(strtolower($_GET['admin_rq'] ?? ''), $admin_response);