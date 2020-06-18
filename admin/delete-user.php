<?php 

include "config.php";

$id =$_GET['id'];

$sql = "DELETE FROM user WHERE 	user_id = {$id}";

if(mysqli_query($conn,$sql)){


header("Location:http://localhost/newssite/admin/users.php");

}else{


echo "Query failed";

}






 ?>