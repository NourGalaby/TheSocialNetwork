<?php 
require('connect.php');
 ?>

<?php 
session_start();
 if(!isset($_SESSION["S_user_id"]))
 {
 echo ' <meta http-equiv="refresh" content="1;url=SignUp.html" />';
 }
 else {

 $EmailAdress=$_SESSION["S_Email"];
 $mem_id=$_SESSION["S_user_id"];

$id = $mem_id;}

//print each post
$sql = "SELECT p.post_id,l.first_name,l.last_name,p.post_date,p.is_public,p.caption
FROM member as m 
Join friend_list as  f 
on m.member_id = f.member_id
JOIN post as p
ON p.member_id = f.friend_id
Join member as l
on p.member_id = l.member_id
WHERE m.member_id=$id;
";
$query=mysqli_query($conn,$sql) or die(mysqli_error());
//echo " HERE !!!!!!!!!!!!!!";
WHILE ($rows = mysqli_fetch_array($query)){
	//var_dump($rows);
//	echo $rows['post_id']."<br>";
//echo $rows['first_name'];
//echo ' ';
//echo $rows['last_name']."<br>";
//echo $rows['post_date']."<br>";
//echo $rows['caption']."<br>";
//echo $rows['is_public']."<br>";
//echo "<br>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <script src="jquery.js" type="text/javascript" language="javascript"></script> 
  <script src="ajax.js"> </script>
  <script src="script.js"> </script>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">  
body {  
 
  background-image: url("back.png");
  background-size: 100%;
 
}
@media (min-width: 768px) {
    .container{
        width:800px;
    }
}
</style>
</head>

<body>


  <!-- NAVBAR -->
<?php
include('navbar.php');
  ?>


  
 <!-- POSSTTTTT -->
<div class="container">

  <form role="form" action="Post_enter.php" id="form" method="post" enctype="multipart/form-data">
    <div class="form-group">

      <textarea class="form-control" rows="5" name="caption" id="caption" name="caption" placeholder="What's on your mind?"></textarea>

       <button type="submit" class="btn btn-success btn-block" >Post</button>
<input type="file" class="btn btn-success" name="fileToUpload" id="fileToUpload">
    </div>

  
<div class="checkbox">
     <input type="radio" name="ispublic" value="true" checked><b> Public</b>
  <br>
  <input type="radio" name="ispublic" value="false"> <b> Friends only </b>
    </div>

  </form>
  <hr>

</div>

<!-- End OF POSSTTTTT -->

<!--FRIENDS WITH POSTS-->

<div class="container">
<div class="panel panel-default">
  <div class="panel-body">  
	<div class = "media">
   <!--<a class = "pull-left" href = "#">
      <img class = "media-object" src = "/bootstrap/images/64.jpg" alt = "Media Object">
   </a>
   <div class = "media-body">-->

<?php 
$id = $mem_id;

//print each post
$sql = "SELECT l.profile_pic,p.post_id,l.first_name,l.last_name,p.post_date,p.is_public,p.caption
FROM member as m 
Join friend_list as  f 
on m.member_id = f.member_id
JOIN post as p
ON p.member_id = f.friend_id
Join member as l
on p.member_id = l.member_id
WHERE m.member_id=$id;
";
$query=mysqli_query($conn,$sql) or die(mysqli_error());

WHILE ($rows = mysqli_fetch_assoc($query)){
	
	//profile pic
$mime = "image/jpeg";
echo "<a class = \"pull-left\" href = \"#\">\n";
      $b64Src = "data:".$mime.";base64," . base64_encode($rows["profile_pic"]);
      echo '<img src="'.$b64Src.'" alt="" class="img-circle" width="50" height="50"/>';
     echo "   </a>\n";
     //end of profile pic
echo '   ';

        echo "   <div class = \"media-body\">\n"; 

//name and post
echo ' <h4 class = "media-heading"> ';
//echo $rows['post_id']."<br>";

echo $rows['first_name'];
echo ' ';
echo $rows['last_name'];
echo ' ';
echo "<small>";
echo $rows['post_date']."<br>";
echo "</small>";
echo '</h4>';

echo $rows['caption']."<br>";
//echo $rows['is_public']."<br>";
echo "<br>";
        echo "</div>\n";

}

?>

</div>
</div>
</div>
</div>


</body>
</html>
