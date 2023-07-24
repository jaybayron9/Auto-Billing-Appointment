<?php  

date_default_timezone_set("Asia/Manila");
session_start();

require_once 'app/functions.php'; 
require_once app('DBConn');

foreach (glob('app/utils/*.php') as $utils) { require_once $utils; }
foreach (glob('app/controller/accts/*.php') as $acct) { require_once $acct; }
foreach (glob('app/controller/clients/*.php') as $data) { require_once $data; }
foreach (glob('app/httproutes/*.php') as $route) { require_once $route; }

// Page Contents
include_once(view('partials', 'header'));
include_once(getURL($GET));
include_once(view('partials', 'footer'));  