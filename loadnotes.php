<?php
session_start();
include('connectionn.php');

$user_id = $_SESSION['user_id'];

// // Delete empty notes
// $sqlDeleteEmpty = "DELETE FROM notes WHERE note=''"; 
// $resultDeleteEmpty = mysqli_query($conn, $sqlDeleteEmpty);

// if (!$resultDeleteEmpty) {
//     echo '<div class="alert alert-warning">An error occurred while deleting empty notes.</div>';
//     exit;
// }

$sql = "SELECT id, note, time FROM notes WHERE user_id='$user_id' ORDER BY time DESC";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $note_id = $row['id'];
        $note = $row['note'];
        $time = date("F d, Y h:i:s A", $row['time']);

        echo "
        <div class='note'>
            <div class='col-xs-5 col-sm-3 delete'>
            <button type='button' class='btn btn-danger' style='width:100%'>
              Delete
            </button>
                
            </div>
            <div class='noteheader' id='$note_id'>
                <div class='text'>$note</div>
                <div class='timetext'>$time</div>    
            </div>
        </div>";
    }
} else {
    echo '<div class="alert alert-warning">An error occurred while loading notes.</div>';
}
?>
