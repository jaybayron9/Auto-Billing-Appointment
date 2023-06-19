<?php

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function HOME($value = '') {
    switch (true) {
        case urlIs('vs=?admin') || urlIs('vs=employees') || urlIs('vs=schedules')  || urlIs('vs=approved') || urlIs('vs=walk-in') || urlIs('vs=reports') || urlIs('vs=pms') || urlIs('vs=pms-i') || urlIs('vs=repairs') || urlIs('vs=repair-service') || urlIs('vs=user-settings') || urlIs('vs=backup')|| urlIs('vs=history') || urlIs('vs=payments') || urlIs('vs=admin-messages') :
            return $value = '?vs=?admin';
            break;
        case urlIs('vs=?emp') || urlIs('vs=job-order') || urlIs('vs=schedules') || urlIs('vs=schedules'):
            return $value = '?vs=?emp';
            break;
        case urlIs('vs=?client') || urlIs('vs=inbox') || urlIs('vs=appointments') || urlIs('vs=report-status') || urlIs('vs=service-history') || urlIs('vs=car-list'):
            return $value = '?vs=?client';
            break;
        default: break;
    }
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

function core($file) {
    return "core/{$file}.php";
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