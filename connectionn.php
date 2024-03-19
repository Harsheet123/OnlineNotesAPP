 <?php
include("setting.php");
$conn = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_error()){
    die('ERROR: Unable to connect:' . mysqli_connect_error()); 
    
}
?>