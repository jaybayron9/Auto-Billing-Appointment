<?php  

use userData\User;

$user_response = [
    'user_add_appointment' => ['obj' => new User(), 'method' => 'user_add_appointment'], 
    'user_cancel_appointment' => ['obj' => new User(), 'method' => 'user_cancel_appointment'], 
    'add_car' => ['obj' => new User(), 'method' => 'add_car'], 
]; 

HTTPR(strtolower($_GET['user_rq'] ?? ''), $user_response);