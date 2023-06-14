<?php
// include "connector.php";

$message = $_POST['message'];
$email = $_POST['email'];


header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Alllow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

$data = json_decode(file_get_contents("php://input"), true);
//Declared variables for patient

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tatcojeth1018@gmail.com';                      //SMTP username
    $mail->Password   = 'mgtudxmyolfrlrpt';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('tatcojeth1018@gmail.com');
    $mail->addAddress($email);     //Add a recipient             //Name is optional
    $mail->addReplyTo('tatcojeth1018@gmail.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'CJCE AutoParts';
    $mail->Body    =  $message;
    
              
    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }



?>
<script>
alert(" Email Successfully Sent!")
</script>
<?php
header("refresh:0;url=index.php");
?>