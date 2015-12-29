<?php
session_start();
include("connect.php");
$mem_id=$_SESSION["S_user_id"];
$liked_post=$_POST['post_id'];
 
if($query=mysqli_query($conn,"INSERT INTO post_like (`member_id`,`post_id`) VALUES ('$mem_id','$liked_post')") > 0){

}
	else{

}

echo "<br>  <br> You will be redirirected to the main page in 1 second  <br> ";
echo ' <meta http-equiv="refresh" content="0;url=profile.php" />';
?>
