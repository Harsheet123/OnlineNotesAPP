<?php
// Start session
session_start();

// Connect to the database
include("connectionn.php");

// Define error messages
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$missingPassword = '<p><strong>Please enter your password!</strong></p>';

$response = array(); // Initialize the response array

// Check user inputs
if (empty($_POST["loginemail"])) {
    $response['error'] = $missingEmail;
} elseif (empty($_POST["loginpassword"])) {
    $response['error'] = $missingPassword;
} else {
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);

    // Prepare variables for the query
    $email = mysqli_real_escape_string($conn, $email);
    $password = hash('sha256', $password);

    // Run query: Check combination of email & password exists
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password' AND activation='activated'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $response['error'] = '<div class="alert alert-danger">Error running the query!</div>';
    } else {
        // If email & password don't match, set an error message
        $count = mysqli_num_rows($result);
        if ($count !== 1) {
            $response['error'] = '<div class="alert alert-danger">Wrong Username or Password</div>';
        } else {
            // Log the user in: Set session variables
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            if (!empty($_POST['rememberme'])) {
                // Create two variables $authenticator1 and $authenticator2
                $authenticator1 = bin2hex(openssl_random_pseudo_bytes(10));
                $authenticator2 = openssl_random_pseudo_bytes(20);

                // Store them in a cookie
                function f1($a, $b) {
                    $c = $a . "," . bin2hex($b);
                    return $c;
                }
                $cookieValue = f1($authenticator1, $authenticator2);
                setcookie(
                    "rememberme",
                    $cookieValue,
                    time() + 1296000
                );

                // Run query to store them in rememberme table
                function f2($a) {
                    $b = hash('sha256', $a);
                    return $b;
                }
                $f2authenticator2 = f2($authenticator2);
                $user_id = $_SESSION['user_id'];
                $expiration = date('Y-m-d H:i:s', time() + 1296000);

                $sql = "INSERT INTO rememberme
                (`authenticator1`, `f2authenticator2`, `user_id`, `expires`)
                VALUES
                ('$authenticator1', '$f2authenticator2', '$user_id', '$expiration')";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    $response['error'] = '<div class="alert alert-danger">There was an error storing data to remember you next time.</div>';
                } else {
                    $response['status'] = 'success';
                    $response['redirect'] = 'http://harsheet.host20.uk/notes/Onlinenotesloggedin.php';
                }
            } else {
                $response['status'] = 'success';
                $response['redirect'] = 'http://harsheet.host20.uk/notes/Onlinenotesloggedin.php';
            }
        }
    }
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
