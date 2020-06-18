<?php 

include "config.php";

$id = $_GET['id'];
$catid = $_GET['catid'];


$sql1 = "SELECT * from post WHERE post_id = {$id}";
$result = mysqli_query($conn,$sql1) or die("Query Failed");
$row = mysqli_fetch_assoc($result);

unlink("upload/".$row['post_img']);



$sql ="DELETE from post WHERE post_id = {$id};";
$sql .="UPDATE category SET post = post-1 WHERE category_id ={$catid}";

if(mysqli_multi_query($conn,$sql)){

header("Location:http://localhost/newssite/admin/post.php");
}else{
	echo "Query failed";
}




 ?>