<?php
ini_set('display_errors',1);
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../../vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['name'])){
    $name = $_POST['name'];
  }
  if(isset($_POST['email'])){
    $email = $_POST['email'];
  }
  if(isset($_POST['message'])){

    $message = $_POST['message'];
} }



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp-es.securemail.pro';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cursonascor@cartaclic.es';                     //SMTP username
    $mail->Password   = 'cursoNascor***-';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 567;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->setFrom($email, $name);

    //Recipients

    $mail->addAddress('jendevelopez@hotmail.com', 'yo misma');     //Add a recipient
  

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Asunto de correo';
    $mail->Body    = "Nombre: $name<br> Email:$email<br><p>$message</p>";
    $mail->AltBody = 'Contenido del correo sin html';
    $mail->send();
    echo 'El mensaje se ha enviado con exito';
} catch (Exception $e) {
    echo "El mensaje no se ha enviado Mailer Error: {$mail->ErrorInfo}";
    var_dump($e);
}