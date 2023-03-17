<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
if (isset($_POST['submit'])) {

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.titan.email';
    $mail->SMTPAuth = true;
    $mail->Username = 'blackduck@horticulture.systems';
    $mail->Password = 'Rot@2112002Ma';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('blackduck@horticulture.systems');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];
    $mail->send();

    echo "<script>alert('Message sent successfully');
document.location.href='../home.html';
</script>";
}
