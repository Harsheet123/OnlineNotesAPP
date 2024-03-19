<?php
session_start();
include('connectionn.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($recipient_email, $note_content) {
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;  // Set this to 2 for debugging
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'false';
        $mail->SMTPAutoTLS = 'false';

        $mail->Username   = 'harsheetkaur546@gmail.com';  // Replace with your email address
        $mail->Password   = 'vffbcqwwabuxlvad';  // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Enable SSL encryption
        $mail->Port       = 587;
        $mail->SMTPSecure = 'tls';

        // Recipients
        $mail->setFrom('harsheetkaur546@gmail.com', 'Harsheet kaur');  // Replace with your name and email
        $mail->addAddress($recipient_email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'You have received a shared note';
        $mail->Body = '
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #f4f4f4;
                }
                h2 {
                    background-color: #007BFF;
                    color: #fff;
                    padding: 10px;
                    text-align: center;
                }
                .note-content {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>You have received a shared note</h2>
                <div class="note-content">
                    ' . $note_content . '
                </div>
            </div>
        </body>
        </html>';
        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
}

// Fetch the user's notes
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM notes WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Handle the form submission
if (isset($_POST['share'])) {
    $note_id = $_POST['note_id'];
    $recipient_email = $_POST['recipient_email'];

    // Validate the recipient's email address (you can add more validation)
    if (!filter_var($recipient_email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid recipient email address.";
    } else {
        // Check if the note exists and belongs to the logged-in user
        $sql = "SELECT * FROM notes WHERE id = ? AND user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $note_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $error_message = "Note not found or does not belong to you.";
        } else {
            // Note exists and belongs to the user, so proceed with sharing
            $sql = "SELECT * FROM shared_notes WHERE note_id = ? AND shared_with = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $note_id, $recipient_email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error_message = "Note is already shared with this recipient.";
            } else {
                // Fetch the note content
                $sql = "SELECT note FROM notes WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $note_id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows === 0) {
                    $error_message = "Note not found or does not belong to you.";
                } else {
                    $row = $result->fetch_assoc();
                    $note_content = $row['note']; // Assuming 'note' is the name of the column containing note content
                }
                
                // Insert the sharing information into the shared_notes table
                $sql = "INSERT INTO shared_notes (note_id, user_id, shared_with) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iss", $note_id, $user_id, $recipient_email);

                if ($stmt->execute() && sendMail($recipient_email, $note_content)) {
                    echo "<div class='alert alert-success'>The note has been shared.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error sending email. Please try again later.</div>";
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Notes</title>
    <style>
    /* Share Notes Page Styles */
#shareNotesModal {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 0 auto;
}

#shareNotesModal h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}

#shareNotesModal label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    color: #666;
}

#shareNotesModal select,
#shareNotesModal input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

#shareNotesModal button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
}

#shareNotesModal button:hover {
    background-color: #0056b3;
}

/* Additional Styles for My Notes Page */
#myNotesModal {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#myNotesmodal h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.note {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 15px;
    background-color: #f9f9f9;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

/* Email Content Styling */
.email-content {
    font-size: 16px;
    line-height: 1.5;
    color: #333;
}

.email-content p {
    margin-bottom: 10px;
}




</style>


</head>
<body>
    <h1>Share Notes</h1>

    <?php
    if (isset($error_message)) {
        echo '<div style="color: red;">' . $error_message . '</div>';
    }

    if (isset($success_message)) {
        echo '<div style="color: green;">' . $success_message . '</div>';
    }
    ?>

    <form method="post" action="share_notes.php">
        <label for="note_id">Select a note to share:</label>
        <select name="note_id" required>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['note'] . '</option>';
            }
            ?>
        </select>

        <br><br>

        <label for="recipient_email">Recipient's Email:</label>
        <input type="email" name="recipient_email" required>

        <br><br>

        <button type="submit" name="share">Share Note</button>
    </form>

    <p><a href="my_notes.php">Back to My Notes</a></p>
</body>
</html>
