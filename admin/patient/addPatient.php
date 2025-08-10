
<?php 

require_once("../checkLogin.php");
require_once("../connection.php");
          if(isset($_POST["patient_name"])){
          $patient_name=$_POST["patient_name"];
          $gender=$_POST["gender"];
          $phone=$_POST["phone"];
          $regester_date=$_POST["regester_date"];
      


         $result= mysqli_query($con,"INSERT INTO patient VALUES(null,'$patient_name', $gender, '$phone','$regester_date')");
  
         if($result){
            header("location:patient_list.php?add=successfuly");
         }else{
            header("location:patient_add.php?error=failed");
         }

          }
          
   
?>
<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>


<div class="col-xl-6 col-lg-6 col-md-6 mt-5 p-4 col-sm-12 col-12 mx-auto ">
        <div class="card mt-5">
            <h5 class="card-header bg-primary text-white">Add patient</h5>
            <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data" class="">
    <div class="form-group">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">patient name</span></span>
        <input type="text" name="patient_name" class="form-control">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend"><span class="input-group-text">Gender</span></div>
        <label for="gender">
            <input type="radio" name="gender"  value="1" checked="" class="ml-2">
            male
        </label>
        <label for="gender">
            <input type="radio" name="gender" value="0" checked="" class="ml-3">
            female
        </label>
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">phone</span></span>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">regester date</span></span>
        <input type="date" name="regester_date" class="form-control">
    </div>
   
     <input type="submit" value="addNew" class="btn btn-primary">
      </div>
     </form>
    </div>
   </div>
</div>
   <?php include_once "../../inc/jsScript.php"; ?>

