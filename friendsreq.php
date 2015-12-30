<?php
 
session_start();

include("connect.php");

$mem_id=$_SESSION["S_user_id"];


$conn = new mysqli($servername, $db_username, $db_password,$db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: <br/> " . $conn->connect_error);
}
?>

<?php 
$member =0; //must have for navbar
 if(!isset($_SESSION["S_user_id"]))
 {
 echo ' <meta http-equiv="refresh" content="1;url=SignUp.html" />';
 }
 else {

 $EmailAdress=$_SESSION["S_Email"];
 $mem_id=$_SESSION["S_user_id"];

$id = $mem_id;}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <script src="jquery.js" type="text/javascript" language="javascript"></script> 
  <script src="ajax.js"> </script>
  <script src="script.js"> </script>
  <title>Friend request</title>
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

<!--BOOOODDDDYYYYYYY-->

<body>

<!--NAVBAR-->
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
            <p class="navbar-text navbar-left">
      Logged in as: 
<?php 

$query=mysqli_query($conn,"SELECT member.first_name,member.Last_name
  FROM member WHERE member.member_id=$mem_id") or die(mysql_error());

WHILE ($rows = mysqli_fetch_array($query)){
echo "<b>";
echo $rows['first_name'];
echo " " ;
echo $rows['Last_name'];
echo "</b>";
}
?>

</p>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <form action="Session_Die.php" class="navbar-form navbar-right" method="post">
        <div class="form-group">
         <input type="submit" class="btn btn-danger"  value="Logout"  >
        </div>
      </form>
<form action="profile.php" class="navbar-form navbar-right" method="post">
        <div class="form-group">
         <input type="submit" class="btn btn-info"  value="View Your Profile"  >
        </div>
      </form>

      <form class="navbar-form navbar-left" action="search.php" method="post">
           <div class = "col-lg-6">
            <div class = "input-group">
                <div class="col-sm-1">
               <input type = "text" class = "form-control" id="search" name= "search" placeholder="What are you looking for?">
              
               <span class = "input-group-btn">
                  <button class = "btn btn-info" type = "submit">
                     Search
                  </button>
                  </div>
               </span>
            </div>
         </div>
      </form>
    </div>
  </div>
</nav>


<div class="container">

<h1>Friend Requests..</h1>
    <div class="panel">
      <div class="panel-body">
        <div class = "media">

<?php

$friend ="Select m.first_name,m.last_name,m.member_id,m.profile_pic,m.about_me,f.req_mem_id From member m JOIN friend_req f on f.member_id = m.member_id where f.req_mem_id='$mem_id'" ;
$result = mysqli_query($conn, $friend);

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        $firstname =$row["first_name"] ;
        $lastname =$row["last_name"] ;
        $memberid =$row["member_id"] ;
        $image=$row["profile_pic"] ;
        $about=$row["about_me"];
        $mime = "image/jpeg";
       
        echo "<a class = \"pull-left\" href = \"#\">\n";
        $b64Src = "data:".$mime.";base64," . base64_encode($row["profile_pic"]);
        echo '<img src="'.$b64Src.'" alt="" class="img-circle" width="50" height="50"/>';
        echo "   </a>\n";

        echo "   <div class = \"media-body\">\n"; 

        echo ' <h4 class = "media-heading"> ';


        echo "<a href=\"profile.php?ID=";
        echo $memberid.'"'.">";
        echo ($firstname);
        echo " ";
        echo($lastname);
        echo"</a>\n";
        echo '</h4>';
        echo ' ';
        echo ($about);	
        echo "<br>";
        echo "<br>";
		
$member_id =$memberid;

echo "<form class=\"btn-group\" action='acceptedreq.php' method='POST'>\n";
echo "<button type=\"submit\" class=\"btn btn-sm btn-info\" id=\"Confirm\" name='member_id' value=$member_id>\n";
echo "<span class=\"glyphicon glyphicon-ok\"></span> Confirm\n";
echo "</button>\n";
echo " </form>\n";
	
echo "<form  class=\"btn-group\" action='deletereq.php' method='POST'>\n";
echo "<button type=\"submit\" class=\"btn btn-sm btn-danger\" id=\"Delete request\" name='member_id' value=$member_id>\n";
echo "<span class=\"glyphicon glyphicon-remove\"></span> Delete\n";
echo "</button>\n";
echo " </form>\n";	
echo "</div>\n";
echo "<hr>";

		
    }

?>
 
      </div>
      </div>
    </div>
</div>



</body>
</html>
