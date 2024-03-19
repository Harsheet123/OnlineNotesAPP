<?php
session_start();
include('connectionn.php');

// Function to safely get URL parameters
function getParam($name) {
    return isset($_GET[$name]) ? $_GET[$name] : null;
}

// Check if required parameters are present
$email = getParam('email');
$newemail = getParam('newemail');
$key = getParam('activationKey');

if (!$email || !$newemail || !$key) {
    echo '<div class="alert alert-danger">There was an error. Please click on the link you received by email.</div>';
    exit;
}

// Sanitize and escape the parameters
$email = mysqli_real_escape_string($conn, $email);
$newemail = mysqli_real_escape_string($conn, $newemail);
$key = mysqli_real_escape_string($conn, $key);

// Update email in the database
$sql = "UPDATE user SET email='$newemail', activation2='0' WHERE email='$email' AND activation2='$key' LIMIT 1";

if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) == 1) {
    // Email updated successfully
    session_destroy();
    setcookie("rememeberme", "", time() - 3600);
    echo '<div class="alert alert-success">Your email has been updated.</div>';
    echo '<a href="index.php" class="btn btn-lg btn-success">Log in</a>';
} else {
    // Error occurred during the update
    echo '<div class="alert alert-danger">Your email could not be updated. Please try again later.</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
}

mysqli_close($conn);
?>
