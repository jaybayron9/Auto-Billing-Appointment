<?php 

date_default_timezone_set("Asia/Manila");
session_start();

require_once('core/functions.php');
require_once(core('DBConn'));
require_once(core('Admin'));
require_once(core('Employee'));
require_once(core('Client'));
require_once(core('Auth'));
require_once(core('http-request'));

if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY)) {
    require(view('partials/dashboard', 'header'));
    require(view('partials/dashboard', 'navbars'));
    require(getURL($GET));
    require(view('partials/dashboard', 'footer'));
} else {
    require(view('partials/guest', 'header'));
    require(getURL($GET));
    require(view('partials/guest', 'footer'));
}