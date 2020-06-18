<?php 

include "config.php";
if(isset($_FILES['fileToUpload'])){

$errors = array();
$file_name = $_FILES['fileToUpload']['name'];
$file_size = $_FILES['fileToUpload']['size'];
$file_tmp = $_FILES['fileToUpload']['tmp_name'];
$file_type = $_FILES['fileToUpload']['type'];
$file_ext = explode('.', $file_name);
$file_ext1 =  end($file_ext);


$extension = array("jpeg","jpg","png");

if(in_array($file_ext1, $extension) === false){

$error[] = "This extension file not allowed,please choose a jpg or png file";

}
if($file_size>2097152){
$error[] = "File size must be 2mb or Lower";

}
if(empty($errors) == true){
	move_uploaded_file($file_tmp, "upload/".$file_name);
}else{
 print_r($errors);
 die();
}

}

$title  = $_POST['post_title'];
$description =$_POST['postdesc'];
$category = $_POST['category'];
$date = date("d M, Y");
session_start();
$author = $_SESSION['user_id'];

$sql = "INSERT INTO post (title,description,category,post_date,author,post_img) VALUES ('$title','$description','$category','$date',$author,'$file_name');";
 $sql .= "UPDATE category SET post = post+1 WHERE category_id = $category";

 $result = mysqli_multi_query($conn,$sql) or  die("Query failed: " . mysqli_connect_error());
if($result){


header("Location:http://localhost/newssite/admin/post.php");

}







 ?>
