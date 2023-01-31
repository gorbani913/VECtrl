<?php

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Include Composer autoload.php file
require 'vendor/autoload.php';

//SMTP Username:AKIAUJLEK5DMWY62KQZE
//SMTP Password: BFEz9zeG47arh0HURhl2PEiZPV0kfy3+pLtwuK3FOFeJ

if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}


$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$AmazonVerifiedEmail = "saeed.gorbani@vectrl.com"; // Change this email to your //
$subject = "$m_subject";
$body =   "<!DOCTYPE html>
          <html>
            <body><p style='color:blue;'><strong>You have received a new message from your website contact form. Here are the details:</strong><br>
              Name: $name<br>
              Email: $email</p><br><br>
              <p>$message</p>
            </body>
          </html>";

$header = "From: $email";
$header = "Reply-To: $email";	

$mail = new PHPMailer;
$mail->isSMTP();       //Send using SMTP
$mail->SMTPDebug = 0;  // Enable verbose debug output         
$mail->Host       = 'email-smtp.us-west-1.amazonaws.com'; //Set the SMTP server to send through
//$mail->Host       = 'smtp.office365.com'; //Set the SMTP server to send through
$mail->Port       = 587;  
$mail->SMTPSecure = 'tls'; 
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'AKIAUJLEK5DMWY62KQZE';                     //SMTP username
$mail->Password   = 'BFEz9zeG47arh0HURhl2PEiZPV0kfy3+pLtwuK3FOFeJ';                               //SMTP password
//$mail->Username   = 'saeed.gorbani@vectrl.com';                     //SMTP username
//$mail->Password   = 'Minpass$621';                               //SMTP password
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption

//Set who the message is to be sent from
$mail->setFrom($AmazonVerifiedEmail,  'Mail From VECtrl.com');
$mail->addAddress($AmazonVerifiedEmail , $name);
$mail->addReplyTo($email , $name);
$mail->Subject = $subject;
$mail->isHTML(true);
$mail->msgHTML($body);

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}


//Set PHPMailer to use the sendmail transport
//$mail->isSendmail();
//Set who the message is to be sent from
//$mail->setFrom($email,  strip_tags(htmlspecialchars($_POST['name'])));

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//$mail->addReplyTo($email , $name);
//Set who the message is to be sent to
//$mail->addAddress($email , $name);

//Set the subject line


//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//
?>
