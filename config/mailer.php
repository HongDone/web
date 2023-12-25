<?php
//require "../PHPMailer-master/src/PHPMailer.php"; 
require(dirname(dirname(__FILE__)) . "/PHPMailer-master/src/PHPMailer.php");
//require "../PHPMailer-master/src/SMTP.php"; 
require(dirname(dirname(__FILE__)) . "/PHPMailer-master/src/SMTP.php");
//require '../PHPMailer-master/src/Exception.php'; 
require(dirname(dirname(__FILE__)) . "/PHPMailer-master/src/Exception.php");
$mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions


// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = "cnpm.g4@gmail.com";
$mail->Password = "wjwvlctgsgwgjqzd";

$mail->isHtml(true);

return $mail;