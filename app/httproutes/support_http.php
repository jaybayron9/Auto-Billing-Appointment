<?php    

use PDF\PDF;
use supportData\Support; 

$support_response = [
    'save_booking_summary' => ['obj'=> new Support(), 'method' => 'save_booking_summary'],
    'receipt'  => ['obj'=> new PDF(), 'method' => 'receipt'],
    'show_book_summary' => ['obj'=> new Support(), 'method' => 'show_book_summary'],
    'set_session_print' => ['obj'=> new Support(), 'method' => 'set_session_print'],
]; 

HTTPR(strtolower($_GET['support_rq'] ?? ''), $support_response);