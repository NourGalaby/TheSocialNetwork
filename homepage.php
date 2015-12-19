
<?php 
require('connect.php');
 ?>

<html>
<body>

<div class="container">
  <h2>Make a new Post</h2>

  <form role="form" action="Post_enter.php" id="form" method="post">
    <div class="form-group">

      <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
  <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>



</body>
</html>








<?php 
$id = 1;
//print each post



$sql = "SELECT p.post_id,l.first_name,l.last_name,p.post_date,p.is_public,p.caption
FROM member as m 
Join friend_list as  f 
on m.member_id = f.member_id
JOIN post as p
ON p.member_id = f.friend_id
Join member as l
on p.member_id = l.member_id
WHERE m.member_id=1;
";


$query=mysqli_query($conn,$sql) or die(mysqli_error());

//echo " HERE !!!!!!!!!!!!!!";


WHILE ($rows = mysqli_fetch_array($query)){
	//var_dump($rows);
	echo $rows['post_id']."<br>";
echo $rows['first_name'];
echo ' ';
echo $rows['last_name']."<br>";
echo $rows['post_date']."<br>";
echo $rows['caption']."<br>";
echo $rows['is_public']."<br>";
echo "<br>";
}
?>