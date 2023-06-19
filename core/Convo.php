<?php 

class Convo extends DBConn {
    public function admin_send() {

    }

    public function client_send() {
        extract($_POST);

        parent::insert('convo', [
            'from_user' => $client_id,
            'send_to' => 'admin1',
            'message' => $message
        ]);
    }

    public function show_convo() {
        extract($_POST);

        $query = "
            SELECT *
            FROM convo 
            WHERE 
                (from_user = '{$from_user}' AND send_to = 'admin1') OR
                (from_user = 'admin1' AND send_to = '{$from_user}')
        ";

        $datas = parent::DBQuery($query);

        foreach ($datas as $conversation) {
            $user = $_SESSION['client_auth'] == $conversation['from_user'] ? 'text-right': 'text-left';
            echo '<div class="block '. $user .'"><span class="bg-blue-600 px-2 text-white font-ligh rounded-full text-lg">'. $conversation['message'] .'</span></div>';
        }
    }
}