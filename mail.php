<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['message'])) {
    $message = $_POST['message'];
}
if (isset($_POST['subject'])) {
    $subject = $_POST['subject'];
}

function sendMail($name, $email, $subject, $message)
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->Username = 'harsheetkaur546@gmail.com';
        $mail->Password = 'vffbcqwwabuxlvad';

        $mail->setFrom($email, $name); // Replace 'Your Name' with your name
        $mail->addAddress('harsheetkaur546@gmail.com'); // Replace with your recipient's email address

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Call the sendMail function to send the email
if (sendMail($name, $email, $subject, $message)) {
    echo "Email sent!";
} else {
    echo "Email could not be sent.";
}
?>
