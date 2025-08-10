
<?php 

require_once("../checkLogin.php");
require_once("../connection.php");


          if(isset($_POST["firstname"])){
          $firstname=$_POST["firstname"];
          $lastname=$_POST["lastname"];
          $gender=$_POST["gender"];
          $dob=$_POST["dob"];
          $nic=$_POST["nic"];
          $position=$_POST["position"];
          $salary=$_POST["salary"];
          $currency=$_POST["currency"];
          $phone=$_POST["phone"];
          $email=$_POST["email"];
          $address=$_POST["address"];
          $hire_date=$_POST["hire_date"];
          $staff_type=$_POST["staff_type"];
          $department_id=$_POST["department_id"];


          $size=$_FILES["photo"]["size"];
          $type=$_FILES["photo"]["type"];


          if($type== "image/jpeg" || $type== "image/png" || $type== "image/gif"){
            if($size <= 6 * 1024 * 1024){ 
                $path="../../images/staff/". time(). $_FILES["photo"]["name"];
                move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
            }else{
                header("location:addStaff.php?filesize=invalid");
            }
          }else{
            header("location:addStaff.php?filetype=invalid");
          }

         $result= mysqli_query($con,"INSERT INTO staff VALUES(null,'$firstname', '$lastname', $gender, $dob, '$nic','$path','$position', $salary,'$currency','$phone','$email','$address','$hire_date',$staff_type,$department_id )");
  
         if($result){
            header("location:staffList.php?add=successfuly");
         }else{
            header("location:addStaff.php?error=failed");
         }

          }
          
         $department=mysqli_query($con,"SELECT * from department ");
         $row_department=mysqli_fetch_assoc($department);
?>
<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>


<div class="col-xl-6 col-lg-6 col-md-6 mt-5 p-4 col-sm-12 col-12 mx-auto ">
        <div class="card mt-5">
            <h5 class="card-header bg-primary text-white">Add staff</h5>
            <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data" class="">
    <div class="form-group">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">FirstName</span></span>
        <input type="text" name="firstname" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">LastName</span></span>
        <input type="text" name="lastname" class="form-control">
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
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Year</span></span>
        <input type="number" name="dob" min="1950" max="2000" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3 "><span class="input-group-prepend "><span class="input-group-text">NIC  </span></span>
        <input type="text" name="nic" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">photo</span></span>
        <input type="file" name="photo" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">position</span></span>
        <input type="text" name="position" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">salary</span></span>
        <input type="text" name="salary" class="form-control">
    </div>
    <div class="form-group">
    <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">currency</span></span>
        <select name="currency" class="form-control">
            <option>AFN</option>
            <option>USD</option>
        </select>
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">phone</span></span>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Email</span></span>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Address</span></span>
        <input type="text" name="address" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Hire Date</span></span>
        <input type="date" name="hire_date" class="form-control">
    </div>
    <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">staff Type</span></span>
        <select name="staff_type" class="form-control">
            <option value="1">doctor</option>
            <option value="2">Nurse</option>
            <option value="3">Employee</option>
        </select>
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

