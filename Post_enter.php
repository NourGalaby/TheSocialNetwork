<?php

$Firstname = $_POST['fname'];
$Lastname = $_POST['lname'];
$Password = $_POST['pw'];
$C_Password = $_POST['C_pw'];
$EmailAdress = $_POST['Email'];
$PhoneNumber = $_POST['pnumber'];
$Birthdate_Day=$_POST['day'];
$Birthdate_Month=$_POST['month'];
$Birthdate_Year=$_POST['birthyear'];
$Gender=$_POST['gender'];
$Hometown=$_POST['hometown'];
$MaritalStatus=$_POST['ms'];
$AboutYou=$_POST['About'];



include("connect.php");

$sql = "SELECT * FROM member WHERE email='$EmailAdress'";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
	echo "Error: Username already exists ";
}


else{
$sql="INSERT INTO `member`( `email`, `password`, `first_name` , `last_name`, `gender` , `birthdate` , `phone_number` , `hometown` , `about_me` , `marital_status` )
VALUES ('$EmailAdress' ,  md5('$Password') ,  '$Firstname' , '$Lastname' , '$Gender' , '$Birthdate_Year-$Birthdate_Month-$Birthdate_Day', '$PhoneNumber' , '$Hometown' , '$AboutYou' , '$MaritalStatus' )";

}
}
if($query=mysqli_query($conn,$sql))
 {
 /// Go to profile
 die();
  }
   else
   echo"error <br/>" .$sql. "<br>" .mysqli_error($conn);


?>