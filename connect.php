<?php 


$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name="facebook";
// Create connection

//echo " Connected to da ";

$conn = new mysqli($servername, $db_username, $db_password,$db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: <br/> " . $conn->connect_error);
} 


 ?>