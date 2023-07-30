<?php     

use Convo\Convo;

$convo_response = [
    'send_message' => ['obj' => new Convo, 'method' => 'send_message'],
    'display_chat' => ['obj' => new Convo, 'method' => 'display_chat']
]; 

HTTPR(strtolower($_GET['convo_rq'] ?? ''), $convo_response);