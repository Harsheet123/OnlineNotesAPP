<?php
session_start();
include('connectionn.php'); // Include the database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Style the body */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

/* Style the header */
h1 {
    text-align: center;
    background-color: #333;
    color: #fff;
    padding: 20px;
    margin: 0;
}

/* Style the main container */
ul {
    list-style-type: none;
    padding: 0;
    margin: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Style individual notes */
li {
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

/* Style the "Share" link */
li a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

/* Hover effect for the link */
li a:hover {
    text-decoration: underline;
}

/* Style the "Logout" link */
p {
    text-align: center;
    margin: 20px;
}

p a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    border: 2px solid #333;
    padding: 10px 20px;
    border-radius: 5px;
    display: inline-block;
    transition: background-color 0.3s, color 0.3s;
}

/* Hover effect for the "Logout" link */
p a:hover {
    background-color: #333;
    color: #fff;
}

     </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>
    <style> 
    
     </style>
</head>
<body>
    <h1>My Notes</h1>

    <ul>
        <?php
        // Fetch and display the user's notes
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM notes WHERE user_id = $user_id";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo '<li>' . $row['note'] . ' - <a href="share_notes.php">Share</a></li>';
        }
        ?>
    </ul>

    <p><a href="Onlinenotesloggedin.php">Logout</a></p>
</body>
</html>
