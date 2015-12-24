 <?php 

include("connect.php");
if(isset($_POST['addfriend'])){




$sql= "INSERT INTO `friend_req`(`member_id`, `req_mem_id`, `req_date`) VALUES ($mem_id,$member,CURRENT_TIMESTAMP)";

if($query=mysqli_query($conn,$sql))
 {
echo " added ";
 }else{
   echo"error <br/>" .$sql. "<br>" .mysqli_error($conn);
 }
}
  ?>