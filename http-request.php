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
    'accept_appointment' => ['obj' => new Admin(), 'method' => 'accept_appointment'],
    'cancel_appointment' => ['obj' => new Admin(), 'method' => 'cancel_appointment'],
    'assign_appointment' => ['obj' => new Admin(), 'method' => 'assign_appointment'],
    'add_payment' => ['obj' => new Admin(), 'method' => 'add_payment'],
    'delete_payment' => ['obj' => new Admin(), 'method' => 'delete_payment'],
    'delete_user' => ['obj' => new Admin(), 'method' => 'delete_user'],

    // EMPLOYEE
    'employee_update_status' => ['obj' => new Employee(), 'method' => 'update_status'],
    
    // CLIENT
    'client_add_appointment' => ['obj' => new Client(), 'method' => 'client_add_appointment'],
    'add_car' => ['obj' => new Client, 'method' => 'add_car'],
    'client_cancel_appointment' => ['obj' => new Client(), 'method' => 'client_cancel_appointment'],
    'send_email' => ['obj' => new Client(), 'method' => 'send_email'],

    // CONVERSATIONS
    'show_messages' => ['obj' => new Convo(), 'method' => 'client_show_convo'],
    'client_send' => ['obj' => new Convo(), 'method' => 'client_send'],
    'admin_show_convo' => ['obj' => new Convo(), 'method' => 'admin_show_convo'],
    'admin_send' => ['obj' => new Convo(), 'method' => 'admin_send'],
    'show_to_admin' => ['obj' => new Convo(), 'method' => 'admin_show_convo'],

    // BACKUP DATABASE
    'backup' => ['obj' => new DBConn(), 'method' => 'backupDatabase'],
];

HTTPR($request, $response); 