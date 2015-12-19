<?PHP

require('connection.php');
$member =1;

$query=mysql_query("SELECT post.post_id,post.post_date,post.caption,post.image,post.is_public,member.first_name,member.Last_name 
	FROM member JOIN post ON post.member_id =member. member_id WHERE member.member_id=$member ") or die(mysql_error());

WHILE ($rows = mysql_fetch_array($query)){

echo $rows['first_name'];
echo ' ';
echo $rows['Last_name']."<br>";
echo $rows['post_date']."<br>";
echo $rows['caption']."<br>";
echo $rows['is_public']."<br>";
}

?>

<!--STYLING-->
 <!DOCTYPE html>
<html lang="en">
<head>
<title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">  
body {  
 
  background-image: url("back.png");
  background-size: 100%;
 
}
 
</style>
</head>
<body>

	<div class = "media">
   <a class = "pull-left" href = "#">
      <img class = "media-object" src = "/bootstrap/images/64.jpg" alt = "Media Object">
   </a>
   <div class = "media-body">


  

<?php 


WHILE ($rows = mysql_fetch_array($query)){

echo "     <h4 class = "media-heading"> ".$rows['first_name']." ".$rows['Last_name']." </h4>";

//echo $rows['first_name'];
echo ' ';
//echo $rows['Last_name']."<br>";
//echo $rows['post_date']."<br>";
echo $rows['caption']."<br>";
//echo $rows['is_public']."<br>";
}


 ?>
      class = "media-heading"><?php echo $rows['first_name']; ?>


    </h4>
    
   </div>
	
</div>
</body>
</html>






</body>