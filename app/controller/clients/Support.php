<?php

namespace supportData;

use DBConn\DBConn; 

class Support {
    public static string $products;
    public static string $price;
    public function save_booking_summary() {  
        self::book_filter($_POST['data']); 
        DBConn::update('booking_summary', [  
            'products' => self::$products,
            'quantity' => '1',
            'price' => self::$price,
            'total' => str_replace([',', '₱'], '', $_POST['total'])
        ], "appointment_id = '{$_POST['app_id']}'");

        self::book_session($_POST['data'], $_POST['total_items'], $_POST['total']); 
        return DBConn::resp();
    }

    public function show_book_summary() {
        $qry = DBConn::DBQuery("SELECT ap.id AS app_id, ap.*, cl.*, cs.*, sv.*, bh.*, bs.*
                FROM appointments ap
                JOIN users cl ON cl.id = ap.user_id
                JOIN cars cs ON cs.id = ap.car_id
                JOIN services sv ON sv.id = ap.service_type_id
                JOIN bussiness_hours bh ON bh.id = ap.service_time_id
                JOIN booking_summary bs ON bs.id = ap.book_summary_id
            WHERE 
                ap.id = '{$_POST['appointment_id']}'
        ");

        // array_push();
        return json_encode($qry);
    }

    public static function book_filter($data) { 
        $products = ''; $price = '';
        for ($i=0; $i < count($data); $i++) {   
            $filterdPrice = str_replace([',', '₱'], '', $data[$i]['price']);
            $products .= $data[$i]['product'].'~';
            $price .= (int)$filterdPrice.'~'; 
        }   
        self::$products = $products;
        self::$price = $price;
    }

    public static function book_session($data, $items, $total):void {
        $book = DBConn::DBQuery("SELECT ap.id AS app_id, ap.*, us.id AS user_id, us.*, cs.id AS car_id, cs.*, bh.*, sv.*
        FROM appointments ap
        JOIN users us ON us.id = ap.user_id
        JOIN cars cs ON cs.id = ap.car_id
        JOIN services sv ON sv.id = ap.service_type_id
        JOIN bussiness_hours bh ON bh.id = ap.service_time_id
        WHERE ap.id = '{$_POST['app_id']}' AND us.id = '{$_POST['user_id']}' AND cs.id = '{$_POST['car_id']}'");

        $_SESSION['book_name'] = isset($book[0]['name']) != '' ? $book[0]['name'] : '-';
        $_SESSION['book_email'] = isset($book[0]['email']) != '' ? $book[0]['email'] : '-';
        $_SESSION['book_phone'] = isset($book[0]['phone']) != '' ? $book[0]['phone'] : '-';
        $_SESSION['book_brand'] = isset($book[0]['car_brand']) != '' ? $book[0]['car_brand'] : '-';
        $_SESSION['book_model'] = isset($book[0]['car_model']) != '' ? $book[0]['car_model'] : '-';
        $_SESSION['book_pms'] = isset($book[0]['pms']) != '' ? $book[0]['pms'] : '-';
        $_SESSION['book_schedule_date'] = isset($book[0]['schedule_date']) != '' ? $book[0]['schedule_date'] : '-'; 
        $_SESSION['book_service_time'] = isset($book[0]['available_time']) != '' ? $book[0]['available_time'] : '-'; 
        $_SESSION['book_data'] = $data;
        $_SESSION['book_total_items'] = $items;
        $_SESSION['book_total'] = $total;
    } 
}