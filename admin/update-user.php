<?php include "header.php"; 

if($_SESSION['user_role'] == 0){

header("Location:http://localhost/newssite/admin/post.php");


}


if(isset($_POST['submit'])){
$conn = mysqli_connect('localhost','root','','newssite') or die("connection failed ");

$id = $_POST['user_id'];
$firstname = $_POST['f_name'];
$lastname = $_POST['l_name'];
$username = $_POST['username'];
$role = $_POST['role'];

$sql1 = "UPDATE user SET first_name = '{$firstname}',last_name = '{$lastname}',username = '{$username}',  role = '{$role }'WHERE   user_id = {$id}";
if(mysqli_query($conn,$sql1)){
header("Location:http://localhost/newssite/admin/users.php");
}else{
echo "Query Failed";
}
}
?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <?php 
                 $conn = mysqli_connect('localhost','root','','newssite') or die("connection failed ");
                 if(isset($_GET['id'])){
              $id = $_GET['id'];
            }else{
              $id = 1;
            }
                 $sql = "SELECT * from user WHERE user_id = {$id}";
                $result = mysqli_query($conn,$sql);
               
                 if(mysqli_num_rows($result)>0){
                 while($row = mysqli_fetch_assoc($result)){

                    ?>
                  <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo$row['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo$row['first_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo$row['last_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo$row['username'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php
                            if($row['role'] == 1){
                             
                            echo"<option value='0'>normal User</option>";
                            echo"<option value='1' selected>Admin</option>";
                              

                             } else{

                          echo"<option value='0' selected>normal User</option>";
                          echo"<option value='1'>Admin</option>";
                           }
                           ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                  <?php 

                   }
                   }
                   ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
