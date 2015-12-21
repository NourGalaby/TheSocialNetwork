<?PHP

require('connect.php');

$member = 1;

?>

<!--STYLING-->
 <!DOCTYPE html>
<html lang="en">
<head>
  <script src="jquery.js" type="text/javascript" language="javascript"></script> 
  <script src="ajax.js"> </script>
  <script src="script.js"> </script>
  <title>Profile</title>
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

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">              
                 <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand" href="homepage.php"> <img src="logo.png" alt="Brand"></a>
            </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <form action="signup.html" class="navbar-form navbar-right" method="post">
        <div class="form-group">
         <input type="submit" class="btn btn-danger"  value="Logout"  >
        </div>
      </form>

      <form class="navbar-form navbar-left" action="search.php">
           <div class = "col-lg-6">
            <div class = "input-group">
                <div class="col-sm-1">
               <input type = "text" class = "form-control" placeholder="What are you looking for?">
              
               <span class = "input-group-btn">
              
                  <button class = "btn btn-default" type = "submit">
                     Search
                  </button>
                  </div>
               </span>
            </div>
         </div>
      </form>

      <form class="navbar-form navbar-right" action="edit.php">
        <button class = "btn btn-warning" type = "submit">
                     Edit Profile
                  </button>
      </form>

    </div>
  </div>

</nav>
    <!-- EDN OF NAVBAR -->

    <!-- HELLOOOOOO -->

<div class="container">
<div class="jumbotron">
<?php 

$query=mysqli_query($conn,"SELECT member.first_name,member.Last_name,member.profile_pic
  FROM member WHERE member.member_id=$member ") or die(mysql_error());

WHILE ($rows = mysqli_fetch_array($query)){

$mime = "image/jpeg";
      $b64Src = "data:".$mime.";base64," . base64_encode($rows["profile_pic"]);
      echo "<center>"; 
      echo '<img src="'.$b64Src.'" alt="" class="img-circle" width="150" height="150"/>';
     echo ' <h2 > ';
echo $rows['first_name'];
echo " " ;
echo $rows['Last_name'];
echo '</h2>';
           echo "</center>"; 


}
?>
</div>
</div>
    <!-- End OF HELLOOO -->
    <hr>


 <!-- POSSTTTTT -->
<div class="container">
<form role="form" action="Post_enter.php" id="form" method="post">
    <div class="form-group">

      <textarea class="form-control" rows="4" id="comment"></textarea>
 <button type="submit" class="btn btn-success btn-block">Post</button>

    </div>

     <input type="file" class="btn btn-success" name="fileToUpload" id="fileToUpload">
      <div class="checkbox">
     <input type="radio" name="ispublic" value="true" checked><b> Public</b>
  <br>
  <input type="radio" name="ispublic" value="false"> <b> Friends only </b>
    </div>
  </form>
</div>
<!-- End OF POSSTTTTT -->
<hr>


<div class="container">
<div class="panel panel-default">
  <div class="panel-body"> 
	<div class = "media">

       <?php

        require('connect.php');
        $sel = "SELECT profile_pic FROM member WHERE member_id='$member'"; 
        $result = mysqli_query($conn, $sel);
        $row= mysqli_fetch_assoc($result);
        $image=$row["profile_pic"];
      

       $mime = "image/jpeg";
echo "<a class = \"pull-left\" href = \"#\">\n";
      $b64Src = "data:".$mime.";base64," . base64_encode($row["profile_pic"]);
      echo '<img src="'.$b64Src.'" alt="" class="img-circle" width="50" height="50"/>';
     echo "   </a>\n";

     ?>
   <div class = "media-body">

<?php 

$query=mysqli_query($conn,"SELECT post.post_id,post.post_date,post.caption,post.image,post.is_public,member.first_name,member.Last_name 
  FROM member JOIN post ON post.member_id =member. member_id WHERE member.member_id=$member ") or die(mysql_error());

WHILE ($rows = mysqli_fetch_array($query)){
echo ' <h4 class = "media-heading"> ';
echo $rows['first_name'];
echo " " ;
echo $rows['Last_name'];
echo ' ';
echo "<small>";
echo $rows['post_date']."<br>";
echo "</small>";
echo '</h4>';
echo ' ';
echo $rows['caption']."<br>";
}

?>

</div>
</div>
</div>
</div>
</div>
</body>
</html>