<?php include "header.php"; 
 

 if(isset($_POST['sumbit'])){
include"config.php";
$id = $_POST['cat_id'];
$categoryname = $_POST['cat_name'];

$sql1 = "UPDATE category SET  category_name = '{$categoryname}' WHERE category_id = {$id}";

if(mysqli_query($conn,$sql1)){

header("Location:http://localhost/newssite/admin/category.php");

}else{

echo "Query Failed";

}


 }



?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                <?php 

                 include"config.php";
                 $id = $_GET['id'];
                 $sql = "SELECT * from category WHERE category_id = {$id}";
                 $result = mysqli_query($conn,$sql);
                 if(mysqli_num_rows($result)){
                 while($row = mysqli_fetch_assoc($result)){
                 ?>
                  <form action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php 

                   }
                 }

                   ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
