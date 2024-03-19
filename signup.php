<?php
//<!--Start session-->
session_start();
include('connectionn.php'); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($email,$activationKey)
{
require ("PHPMailer/PHPMailer.php");
require ("PHPMailer/SMTP.php");
require ("PHPMailer/Exception.php");

$mail = new PHPMailer(true);

try {

    $mail->SMTPDebug = 0;                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = 'true';  
    $mail->SMTPSecure = 'false';
    $mail->SMTPAutoTLS = 'false';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => 'false',
            'verify_peer_name' => 'false',
            'allow_self_signed' => 'true'
        )
    );                                 //Enable SMTP authentication
    $mail->Username   = 'harsheetkaur546@gmail.com';                     //SMTP username
    $mail->Password   = 'vffbcqwwabuxlvad';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPSecure = 'tls'; 
    //Recipients
    $mail->setFrom('harsheetkaur546@gmail.com', 'Harsheet');
    $mail->addAddress($email);     //Add a recipient
   

   
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Activation Mail';
    $mail->Body    = "Thanks for registering, enjoy your journey with making notes. <br> <br> click on the Activation link to verify your mail.
    <a href='http://harsheet.host20.uk/notes/activate.php?email=$email&key=$activationKey'> Activate by clicking on this link </a>";

    

    $mail->send();
    return true;
} catch (Exception $e) {
    return false;
}


}

//<!--Check user inputs-->
//    <!--Define error messages-->
$missingUsername = '<p><strong>Please enter a username!</strong></p>';
 $missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password</strong></p>';
//    <!--Get username, email, password, password2-->
//Get username
if(empty($_POST["username"])){
    $errors .= $missingUsername;
}else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);   
}
//Get email
if(empty($_POST["email"])){
    $errors .= $missingEmail;   
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
    }
}
//Get passwords
if(empty($_POST["password"])){
    $errors .= $missingPassword; 
}elseif(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= $invalidPassword; 
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}
//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

//no errors

//Prepare variables for the queries
$username = mysqli_real_escape_string($conn, $username);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
//$password = md5($password);
$password = hash('sha256', $password);
//128 bits -> 32 characters
//256 bits -> 64 characters
//If username exists in the users table print error
$sql = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
//    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';  exit;
}
//If email exists in the users table print error
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';  exit;
}
//Create a unique  activation code
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
    //byte: unit of data = 8 bits
    //bit: 0 or 1
    //16 bytes = 16*8 = 128 bits
    //(2*2*2*2)*2*2*2*2*...*2
    //16*16*...*16
    //32 characters

//Insert user details and activation code in the users table

$sql = "INSERT INTO user (`username`, `email`, `password`, `activation`) VALUES ('$username', '$email', '$password', '$activationKey')";
$result = mysqli_query($conn, $sql);
if($result &&sendMail($_POST['email'],$activationKey)){
    
       echo "<div class='alert alert-success'>Thank for your registring! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
    
   
    // exit;
}
else
{
    echo "not registered successfully";
    echo '<div class="alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
}
// $to = $email;
//         $subject = "Account Activation";
//         $message = "Hello $username, your activation key is: $activationKey";
//         $headers = "From: noreply@harsheet.host20.uk" . "\r\n";

//         if (mail($to, $subject, $message, $headers)) {
//             echo "Activation email sent. Please check your email for the activation key.";
//         } else {
//             echo "Error sending activation email.";
//         }
    




// Send the user an email with a link to activate.php with their email and activation code
// $message = "Please click on this link to activate your account:\n\n";

// //$projectRoot is taken from the settings.php file which is included in the connection.php file including at the top of this code.
// $message .= $projectRoot . "activate.php?email=" . urlencode($email) . "&key=$activationKey";
// if(mail($email, 'Confirm your Registration', $message, 'From:'.'noreply@harsheet.host20.uk
// ')){
//        echo "<div class='alert alert-success'>Thank for your registring! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
// }
        
       ?>