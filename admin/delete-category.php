<?php 

include "config.php";

$id = $_GET['id'];

$sql =  "DELETE FROM category WHERE category_id = {$id}";

if(mysqli_query($conn,$sql)){

header("Location:http://localhost/newssite/admin/category.php");

}else{

echo "Query Failed";

}







 ?>