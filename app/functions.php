<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);  
// function customErrorHandler($errno,$errstr, $errfile, $errline) {
//     $message = "[$errno], $errstr - $errfile:[$errline]";
//     error_log($message . PHP_EOL, 3, "error_log.md"); 
// } 
// set_error_handler("customErrorHandler");    

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function urlIs($value) {
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY) === $value;
}

function getURL($get) {
    $r = require('routes.php');

    if (array_key_exists($get, $r)) {
        return $r[$get];
    } else {
        return $r['404'];
    }
} 

$GET = isset($_GET['vs']) ? $_GET['vs'] : '';

function view($folder = '', $file = 'index') {
    return empty($folder) ? "views/{$file}.php" : "views/{$folder}/{$file}.php";
}

function app($file) {
    return "app/{$file}.php";
}

function HTTPR($action, $exfunc) {
    if (array_key_exists($action, $exfunc)) {
        echo call_user_func_array([
                $exfunc[$action]['obj'], 
                $exfunc[$action]['method']
            ], 
                isset($exfunc[$action]['args']) ? $exfunc[$action]['args'] : []
            );
        die();
    }
}