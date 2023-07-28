<?php  

date_default_timezone_set("Asia/Manila");
session_start(); 
require 'vendor/fpdf/fpdf.php';
require_once 'vendor/autoload.php'; 
require_once 'app/functions.php'; 
require_once app('DBConn');

foreach (glob('app/utils/*.php') as $class) { require_once $class; }
foreach (glob('app/controller/accts/*.php') as $class) { require_once $class; }
foreach (glob('app/controller/clients/*.php') as $class) { require_once $class; }
foreach (glob('app/httproutes/*.php') as $class) { require_once $class; }

include_once(view('partials', 'header'));
include_once(getURL($GET));
include_once(view('partials', 'footer'));  