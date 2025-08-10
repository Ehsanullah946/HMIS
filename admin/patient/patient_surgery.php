
<?php 

require_once("../checkLogin.php");
require_once("../connection.php");
          if(isset($_POST["surgery_id"])){
          $surgery_id=$_POST["surgery_id"];
          $patient_id=$_POST["patient_id"];
          $staff_id=$_POST["staff_id"];
          $date=$_POST["date"];
          $surgery_result=$_POST["surgery_result"];
      
         $result= mysqli_query($con,"INSERT INTO patient_surgery VALUES(null,$surgery_id, $patient_id, $staff_id,'$date','$surgery_result')");
  
         if($result){
            header("location:patient_surgery_list.php?add=successfuly");
         }else{
            header("location:patient_surgery.php?error=failed");
         }
        }
          $surgery=mysqli_query($con,"SELECT * from surgery ");
          $row_surgery=mysqli_fetch_assoc($surgery);

          $patient=mysqli_query($con,"SELECT * from patient ");
          $row_patient=mysqli_fetch_assoc($patient);

          $staff=mysqli_query($con,"SELECT * from staff ");
          $row_staff=mysqli_fetch_assoc($staff);
          
   
?>
<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>


<div class="col-xl-6 col-lg-6 col-md-6 mt-5 p-4 col-sm-12 col-12 mx-auto ">
        <div class="card mt-5">
            <h5 class="card-header bg-primary text-white">Add patient</h5>
            <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data" class="">


        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">surgery</span></span>
            <select name="surgery_id" class="form-control">
            <?php do {  ?>
                <option value="<?php echo $row_surgery["surgery_id"] ?>"><?php echo $row_surgery["surgery_name"]?></option>
            <?php } while($row_surgery=mysqli_fetch_assoc($surgery)); ?> 
            </select>
        </div>
        
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">patient</span></span>
            <select name="patient_id" class="form-control">
            <?php do {  ?>
                <option value="<?php echo $row_patient["patient_id"] ?>"><?php echo $row_patient["patient_name"]?></option>
            <?php } while($row_patient=mysqli_fetch_assoc($patient)); ?> 
            </select>
        </div>

    <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">staff</span></span>
        <select name="staff_id" class="form-control">
        <?php do {  ?>
            <option value="<?php echo $row_staff["staff_id"] ?>"><?php echo $row_staff["first_name"]?></option>
        <?php } while($row_staff=mysqli_fetch_assoc($staff)); ?> 
        </select>
    </div>
    <div class="form-group">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">date</span></span>
        <input type="date" name="date" class="form-control">
    </div>
    <div class="form-group">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">surgery result</span></span>
        <input type="text" name="surgery_result" class="form-control">
    </div>
    
     <input type="submit" value="addNew" class="btn btn-primary">
      </div>
     </form>
    </div>
   </div>
</div>
   <?php include_once "../../inc/jsScript.php"; ?>

