<?php  

use userData\User;

$user_response = [
    'book_appointment' => ['obj' => new User(), 'method' => 'book_appointment'], 
    'user_cancel_appointment' => ['obj' => new User(), 'method' => 'user_cancel_appointment'], 
    'add_car' => ['obj' => new User(), 'method' => 'add_car'], 
    'show_mycar' => ['obj' => new User(), 'method' => 'show_mycar'], 
    'update_mycar' => ['obj' => new User(), 'method' => 'update_mycar'], 
    'delete_mycar' => ['obj' => new User(), 'method' => 'delete_mycar']
]; 

HTTPR(strtolower($_GET['user_rq'] ?? ''), $user_response);