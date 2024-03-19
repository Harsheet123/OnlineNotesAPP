<?php

//start session and connect
session_start();
include ('connectionn.php');

//get user_id
$id = $_SESSION['user_id'];

//Get username sent through Ajax
$username = $_POST['username'];

//Run query and update username
$sql = "UPDATE user SET username='$username' WHERE user_id='$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
    echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
}

?>