<?php 
$id = 1;


require('connect.php');

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