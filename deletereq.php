<?php
session_start();
include("connect.php");
$mem_id=$_SESSION["S_user_id"];

$del_req=$_POST['req_mem_id'];

$query3=mysqli_query($conn,"DELETE FROM `friend_req` WHERE friend_req.member_id='$mem_id' AND friend_req.req_mem_id='$del_req'");
echo "<br>  <br> You will be redirirected to the main page in 1 secounds  <br> ";
echo ' <meta http-equiv="refresh" content="0;url=profile.php" />';

?>