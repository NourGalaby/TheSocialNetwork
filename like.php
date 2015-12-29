<?php
session_start();
include("connect.php");
$mem_id=$_SESSION["S_user_id"];
$liked_post=$_POST['post_id'];
$liked_id=$_POST['member_id'];
$Q="INSERT INTO post_like (`member_id`,`post_id`) VALUES ('$mem_id','$liked_post')";

$Q2=  "INSERT INTO `notification_l`(`Liker_id`, `Liked_id`, `post_id`) VALUES ($mem_id,$liked_id,$liked_post);  ";




if($query=mysqli_query($conn,$Q) > 0){

}
	else{
	


}

if($query=mysqli_query($conn,$Q2) > 0){

}
	else{
	


}




echo "<br>  <br> You will be redirirected to the main page in 1 secounds  <br> ";
//echo ' <meta http-equiv="refresh" content="0;url=profile.php" />';
?>
