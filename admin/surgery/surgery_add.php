
<?php 

require_once("../checkLogin.php");
require_once("../connection.php");
          if(isset($_POST["surgery_name"])){
          $surgery_name=$_POST["surgery_name"];
          $price=$_POST["price"];
          $department_id=$_POST["department_id"];
      


         $result= mysqli_query($con,"INSERT INTO surgery VALUES(null,'$surgery_name', $price, $department_id)");
  
         if($result){
            header("location:surgery_list.php?add=successfuly");
         }else{
            header("location:surgery_add.php?error=failed");
         }

          }
          $department=mysqli_query($con,"SELECT * from  department ");
          $row_department=mysqli_fetch_assoc($department);

        
?>
<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>


<div class="col-xl-6 col-lg-6 col-md-6 mt-5 p-4 col-sm-12 col-12 mx-auto ">
        <div class="card mt-5">
            <h5 class="card-header bg-primary text-white">Add surgery</h5>
            <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data" class="">
    <div class="form-group">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">surgery name</span></span>
        <input type="text" name="surgery_name" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">price</span></span>
        <input type="text" name="price" class="form-control">
    </div>
    <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Department</span></span>
        <select name="department_id" class="form-control">
        <?php do {  ?>
            <option value="<?php echo $row_department["department_id"] ?>"><?php echo $row_department["department_name"]?></option>
        <?php } while($row_department=mysqli_fetch_assoc($department)); ?> 
        </select>
    </div>
     <input type="submit" value="addNew" class="btn btn-primary">
      </div>
     </form>
    </div>
   </div>
</div>
   <?php include_once "../../inc/jsScript.php"; ?>

