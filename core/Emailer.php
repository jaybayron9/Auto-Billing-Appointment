<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'core/PHPMailer/src/Exception.php';
require_once 'core/PHPMailer/src/PHPMailer.php';
require_once 'core/PHPMailer/src/SMTP.php';

class Emailer {
    public static function send($sendTo, $subject, $body) {

        $config = require('config.php');
        try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = $config['smtp']['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $config['smtp']['username'];
            $mail->Password = $config['smtp']['password'];
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $config['smtp']['port'];

            $mail->setFrom($config['smtp']['username']);

            $mail->addAddress($sendTo);

            $mail->isHTML(true);

            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();

            echo 'Email sent.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}