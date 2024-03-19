<?php
session_start();
include('connectionn.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $user_id, $key)
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
        $mail->SMTPSecure = 'tls'; // or 'ssl'
        $mail->Port = 587; // or 465 for SSL

        $mail->Username = 'harsheetkaur546@gmail.com';
        $mail->Password = 'vffbcqwwabuxlvad';

        $mail->setFrom('harsheetkaur546@gmail.com', 'Harsheet');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Reset Password';
        $mail->Body = "We have received a request by you for password reset. please click on the link below to reset your password. <br> <br>
        <a href='http://harsheet.host20.uk/notes/resetpassword.php?user_id=$user_id&key=$key'> Click here to reset your password </a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';

if (empty($_POST["forgotemail"])) {
    $errors .= $missingEmail;
} else {
    $email = filter_var($_POST["forgotemail"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= $invalidEmail;
    }
}

if ($errors) {
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

$email = mysqli_real_escape_string($conn, $email);

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}

$count = mysqli_num_rows($result);

if ($count != 1) {
    echo '<div class="alert alert-danger">That email does not exist in our database!</div>';
    exit;
}

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user_id = $row['user_id'];
$key = bin2hex(openssl_random_pseudo_bytes(16));
$time = time();
$status = 'pending';
$sql = "INSERT INTO forgotpassword (`user_id`, `rkey`, `time`, `status`) VALUES ('$user_id', '$key', '$time', '$status')";
$result = mysqli_query($conn, $sql);

if ($result && sendMail($email, $user_id, $key)) {
    echo "<div class='alert alert-success'> A email has been sent to $email. Please click on the Link to Reset your password.</div>";
    
   
    // exit;
}
else
{
    echo "not registered successfully";
    echo '<div class="alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
}
?>
