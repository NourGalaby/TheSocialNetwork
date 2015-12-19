<?php
session_start();
$username=$_SESSION["S_username"];


$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name="users";


$conn = new mysqli($servername, $db_username, $db_password,$db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: <br/> " . $conn->connect_error);
} 



$sel="SELECT user_id FROM user WHERE username='$username'";
$result = mysqli_query($conn, $sel);
$row= $row = mysqli_fetch_assoc($result);


$_SESSION["S_user_id"]=$row["user_id"];

echo 'welcome ' ,$username;
echo '<br/>';
echo <<<HTML
<body>
<link rel="stylesheet" href="Welcome_CSS.css"/>
<a href="Choose_department.php">Continue to department selection</a>
</body>
HTML;


?>