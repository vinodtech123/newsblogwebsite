<?php include "header.php"; 

if($_SESSION['user_role'] == 0){
header("Location:http://localhost/newssite/admin/post.php");
}


?>
<?php 

if(isset($_POST['save'])){
$conn = mysqli_connect('localhost','root','','newssite') or die("connection failed ");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['user'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "SELECT username FROM user WHERE username = '{$username}'";
$result = mysqli_query($conn,$sql) or die("query failed");
if(mysqli_num_rows($result)>0){
  echo "Username already exists";
}else{

$sql1 = "INSERT INTO user (first_name,last_name,username,password,role)VALUES('{$fname}','{$lname}','{$username}','{$password}','{$role}')";
if(mysqli_query($conn,$sql1)){
  header("Location:http://localhost/newssite/admin/users.php");
}else{
  echo "query failed";
}

}
}



 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
       
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
