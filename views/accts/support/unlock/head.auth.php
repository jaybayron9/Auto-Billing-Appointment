<?php 
use DBConn\DBConn;
use Auth\Auth;

Auth::check_user_auth(
    'support_id', 'login'
);  
if (Auth::check_user_access(
    'supports', $_SESSION['support_id']
)) {
    unset($_SESSION['support_id']);
    $_SESSION['access_denied'] = true;
    header('refresh: 0');
} 
$conn = new DBConn();
$support_info = DBConn::select('supports', '*', [
        'id' => $_SESSION['support_id']
    ], null, 1);

function selectTab($serv) {
    return isset($_GET['serv']) && $_GET['serv'] == $serv ? 'true' : 'false';
}
function appData($val) {
    global $conn;
    $app_id = isset($_GET['app_id']) ? $_GET['app_id'] : '0';
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '0';
    $car_id = isset($_GET['car_id']) ? $_GET['car_id'] : '0';
    $qry = "SELECT ap.id AS app_id, ap.*, us.id AS user_id, us.*, cs.id AS car_id, cs.*, bh.*
            FROM appointments ap
            JOIN users us ON us.id = ap.user_id
            JOIN cars cs ON cs.id = ap.car_id
            JOIN bussiness_hours bh ON bh.id = ap.service_time_id
            WHERE ap.id = '{$app_id}' AND us.id = '{$user_id}' AND cs.id = '{$car_id}'";
    foreach ($conn::DBQuery($qry) as $app) {
        return $app[$val];
    }
}