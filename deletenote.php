<?php
session_start();
include('connectionn.php');

//get the id of the note through Ajax
$note_id = $_POST['id'];
// run a query to delete the note
$sql = "DELETE FROM notes WHERE id = $note_id";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo 'error';   
}

?>