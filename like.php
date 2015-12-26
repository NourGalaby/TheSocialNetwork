<?php
session_start();
include("connect.php");
$mem_id=$_SESSION["S_user_id"];
$liked_post=$_POST['post_id'];
 
$query=mysqli_query($conn,"INSERT INTO post_like (`member_id`,`post_id`) VALUES ('$mem_id','$liked_post')") or die(mysql_error());

?>
