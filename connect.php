<?php 


$servername = "eu-cdbr-azure-west-d.cloudapp.net";
$db_username = "bc42caf8599026";
$db_password = "64fe1fdb";
$db_name="acsm_8d1adc48b63e3f4";
// Create connection

//echo " Connected to da ";

$conn = new mysqli($servername, $db_username, $db_password,$db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: <br/> " . $conn->connect_error);
} 


 ?>
