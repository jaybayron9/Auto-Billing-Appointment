<?php 

$request = !isset($_GET['rq']) ? '' : strtolower($_GET['rq']);

$response = [
    // AUTH
    'login' => ['obj' => new Auth(), 'method' => 'login'],
    'register' => ['obj' => new Auth(), 'method' => 'register'],
    'forgot_password' => ['obj' => new Auth(), 'method' => 'forgot_password'],
    'logout' => ['obj' => new Auth(), 'method' => 'logout'],

    // ADMIN
    'add_employee' => ['obj' => new Admin(), 'method' => 'add_employee'],
    'get_employee' => ['obj' => new Admin(), 'method' => 'get_employee'],
    'update_employee' => ['obj' => new Admin(), 'method' => 'update_employee'],
    'resign_employee' => ['obj' => new Admin(), 'method' => 'resign_employee'],

    // CLIENT
    'client_add_appointment' => ['obj' => new Client(), 'method' => 'client_add_appointment'],
    'add_car' => ['obj' => new Client, 'method' => 'add_car'],
    'client_cancel_appointment' => ['obj' => new Client(), 'method' => 'client_cancel_appointment']
];

HTTPR($request, $response); 