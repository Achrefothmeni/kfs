<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require './vendor/autoload.php';
//require('vendor/autoload.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->Host = "ssl://smtp.gmail.com"; 
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'lightbox.devis@gmail.com';                     // SMTP username
    $mail->Password   = 'lightbox123';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no-reply@lightbox.tn', $_POST['name']);
    $mail->addAddress('othmeniachref@gmail.com');               // Name is optional


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = '<h4>Name:</h4>'.$_POST['name'].'<br>'.'<h4>email:</h4>'.$_POST['email'].'<br><h4>Message:</h4>'.$_POST['message'];
    //$mail->AltBody = $_POST['message'];

    $mail->send();
    echo 'Votre message a été envoyé, Merci !';
} catch (Exception $e) {
    //echo $e;
    echo "L'envoi du message a été echoué ! veuillez réessayer ultérieurement.";
}