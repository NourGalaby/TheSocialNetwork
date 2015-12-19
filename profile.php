<?PHP
require('connect.php');
$member =1;
$query=mysqli_query($conn,"SELECT post.post_id,post.post_date,post.caption,post.image,post.is_public,member.first_name,member.Last_name FROM member JOIN post ON post.member_id =member. member_id WHERE member.member_id=$member ") or die(mysql_error());
WHILE ($rows = mysqli_fetch_array($query)){
echo $rows['first_name'];
echo ' ';
echo $rows['Last_name']."<br>";
echo $rows['post_date']."<br>";
echo $rows['caption']."<br>";
echo $rows['is_public']."<br>";
}
 ?>