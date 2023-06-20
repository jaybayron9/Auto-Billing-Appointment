<?php 

class Convo extends DBConn {
    public function client_send() {
        extract($_POST);

        parent::insert('convo', [
            'from_user' => $client_id,
            'send_to' => 'admin1',
            'message' => $message
        ]);
    }

    public function client_show_convo() {
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
            $bg = $_SESSION['client_auth'] == $conversation['from_user'] ? 'bg-blue-500': 'bg-gray-500';

            echo "
                <div class='block  $user '>
                    <span class='$bg px-2 py-1 text-white text-md rounded-full'>"
                        . htmlspecialchars($conversation['message']) .
                    "</span>
                    <div class='text-xs font-light mt-2 mb-2'>"
                        . date('Y/m/d h:i a', strtotime($conversation['created_at'])) .
                    "</div>
                </div>
                ";
        }
    }

    public function admin_send() {
        extract($_POST);

        parent::insert('convo', [
            'from_user' => $from,
            'send_to' => $to,
            'message' => $message
        ]);
    }

    public function admin_show_convo() {
        extract($_POST);

        $query = "
            SELECT *
            FROM convo 
            WHERE 
                (from_user = '{$from}' AND send_to = '{$to}') OR
                (from_user = '{$to}' AND send_to = '$from')
        ";

        $datas = parent::DBQuery($query);

        foreach ($datas as $conversation) {
            $user = $from == $conversation['from_user'] ? 'text-right': 'text-left';
            $bg = $from == $conversation['from_user'] ? 'bg-blue-500': 'bg-gray-500';
            echo '<div class="block '. $user .'"><span class="'. $bg .' px-2 py-1 text-white text-md rounded-full">'. htmlspecialchars($conversation['message']) .'</span></div>';
            echo '<span class="text-xs font-light text-center w-full">'. date('Y/m/d h:i a', strtotime($conversation['created_at'])) .'</span>';
        }
    }
}