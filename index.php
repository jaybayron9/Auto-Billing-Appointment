<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1); 

date_default_timezone_set("Asia/Manila");
session_start();

require_once 'app/functions.php';
require_once app('Database');
require_once app('DBConn');

// Utility Classes
foreach (glob('app/utils/*.php') as $utils) {
    require_once $utils;
}

// Clients account
foreach (glob('app/controller/accts/*.php') as $acct) {
    require_once $acct;
}

// Clients data
foreach (glob('app/controller/clients/*.php') as $data) {
    require_once $data;
}

// Http Routes
foreach (glob('app/httproutes/*.php') as $route) {
    require_once $route;
}

// Page Contents
include_once(view('partials', 'header'));
include_once(getURL($GET));
include_once(view('partials', 'footer'));  