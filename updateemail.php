<?php
// Start session and connect to the database
session_start();
include('connectionn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $newemail, $activationKey)
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

        $mail->setFrom('harsheetkaur546@gmail.com', 'Harsheet');
        $mail->addAddress($newemail);

        $mail->isHTML(true);
        $mail->Subject = 'Update email';
        $mail->Body = "Please click on this link to prove that you own this email. <br> <br>
        <a href='http://harsheet.host20.uk/notes/activatenewemail.php?email=$email&newemail=$newemail&activationKey=$activationKey'> Click here for updating your email </a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Get user_id and new email sent through Ajax
$user_id = $_SESSION['user_id'];
$newemail = $_POST['email'];

// Check if new email exists
$sql = "SELECT * FROM user WHERE email='$newemail'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if ($count > 0) {
    echo json_encode(array("status" => "error", "message" => "There is already a user registered with that email! Please choose another one!"));
    exit;
}

// Get the current email
$sql = "SELECT * FROM user WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

if ($count == 1) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $email = $row['email'];
} else {
    echo json_encode(array("status" => "error", "message" => "There was an error retrieving the email from the database"));
    exit;
}

// Create a unique activation code
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));

// Insert new activation code in the user table
$updateActivationSql = "UPDATE user SET activation2 = '$activationKey' WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $updateActivationSql);

if ($result && sendMail($email, $newemail, $activationKey)) {
    echo "<div class ='alert alert-success'> An email has been sent to $newemail. please click on the link to confirm it's your mail account </div>";
  //  echo json_encode(array("status" => "success", "message" => "An email has been sent to your Gmail account. Please click on the link to update your email."));
} else {
    echo json_encode(array("status" => "error", "message" => "An issue occurred while sending the email."));
    exit;
}
?>
