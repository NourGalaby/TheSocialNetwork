<?php

$Email = $_POST['email'];
$Password = $_POST['pw'];


$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name="facebook";


$conn = new mysqli($servername, $db_username, $db_password,$db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: <br/> " . $conn->connect_error);
}


$sql = "SELECT * FROM member WHERE email='$Email'";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) == 0){
    echo("Incorrect Email or Password");}


else{

 $sel = "SELECT password FROM member WHERE email='$Email'";
 $result = mysqli_query($conn, $sel);
 $row= mysqli_fetch_assoc($result);
 $enc_password=$row["password"];
 $encPw= md5($Password);



 



if($enc_password==md5($Password)){
   $sel = "SELECT member_id FROM member WHERE email='$Email'";
 $result = mysqli_query($conn, $sel);
 $row= mysqli_fetch_assoc($result);
 $Member_ID=$row["member_id"];
 
 session_start(); 
 $_SESSION["S_email"]=$Email;
 $_SESSION["S_user_id"]=$Member_ID;


/// Go to profile 


}
else{
	echo("Incorrect Email or Password");

}

}
}

?>