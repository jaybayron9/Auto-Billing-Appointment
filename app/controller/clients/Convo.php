<?php 

namespace Convo;

use PDO;
use DBConn\DBConn;

class Convo extends DBConn {
    public static string $from_id;
    public static string $to_id;
    public static string $msg;

    private static function get_message():void {
        Convo::$from_id = $_POST['from_id'] ?? '';
        Convo::$to_id = $_POST['to_id'] ?? '';
        Convo::$msg = $_POST['msg'] ?? '';
    }

    public static function send() {
        DBConn::insert('convo',[
            'from_user' => Convo::$from_id,
            'send_to' => Convo::$to_id,
            'message' => Convo::$msg
        ]);
    }

    public static function send_message() {
        Convo::get_message();
        Convo::send(); 
        return DBConn::resp();
    }

    protected static function get_convo($from, $to) {
            $query = "SELECT * FROM convo 
                    WHERE 
                        (from_user = :from_1 AND send_to = :to_1) OR
                        (from_user = :to_2 AND send_to = :from_2)";

            $stmt = DBConn::$conn->prepare($query);
            $stmt->bindParam(':from_1', $from, PDO::PARAM_STR);
            $stmt->bindParam(':from_2', $from, PDO::PARAM_STR);
            $stmt->bindParam(':to_1', $to, PDO::PARAM_STR);
            $stmt->bindParam(':to_2', $to, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
    }

    public function display_chat() {  
        Convo::get_message();
        $data = Convo::get_convo(Convo::$from_id, Convo::$to_id); 
        foreach ($data as $convo) {
            $who = Convo::$from_id == $convo['from_user'] ? 'text-right' : 'text-left';
            $bg = Convo::$from_id == $convo['from_user'] ? 'bg-blue-500': 'bg-gray-500';

            echo "<div class='block  $who '>
                    <span class='$bg px-2 py-1 text-white text-md rounded text-sm'>"
                        . htmlspecialchars($convo['message']) .
                    "</span>
                    <div class='text-xs font-light mt-2 mb-2'>"
                        . date('Y/m/d h:i a', strtotime($convo['created_at'])) .
                    "</div>
                </div>";
        } 
    } 
}