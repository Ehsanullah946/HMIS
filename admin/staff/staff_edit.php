
<?php 

require_once("../checkLogin.php");
require_once("../connection.php");
            
        $id=$_GET["staff_id"];
        $staff=mysqli_query($con, "SELECT * FROM staff WHERE staff_id=$id");
        $row_staff=mysqli_fetch_assoc($staff);


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



          if($_FILES["photo"]["name"]!=""){

              $size=$_FILES["photo"]["size"];
              $type=$_FILES["photo"]["type"];


              if($type== "image/jpeg" || $type== "image/png" || $type== "image/gif"){
                  if($size <= 6 * 1024 * 1024){ 
                      $path="../../images/staff/". time(). $_FILES["photo"]["name"];
                move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
                unlink($row_staff["photo"]);
            }else{
                header("location:addStaff.php?filesize=invalid");
            }
          }else{
              header("location:addStaff.php?filetype=invalid");
          }
        }else{
            $path=$row_staff["photo"];
        }

          $result= mysqli_query($con,"UPDATE staff  SET  first_name='$firstname', last_name='$lastname', gender=$gender, dob=$dob, nic='$nic',photo='$path',position='$position', salary=$salary,currency='$currency',phone='$phone',email='$email',address='$address',hire_date='$hire_date',staff_type=$staff_type,department_id=$department_id where staff_id=$id");
  
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
            <h5 class="card-header bg-primary text-white">update staff</h5>
            <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data" class="">
    <div class="form-group">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">FirstName</span></span>
        <input value="<?php echo  $row_staff["first_name"] ?> " type="text" name="firstname" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">LastName</span></span>
        <input value="<?php echo  $row_staff["last_name"] ?>"  type="text" name="lastname" class="form-control">
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
        <input value="<?php echo $row_staff["dob"] ?>"  type="number" name="dob" min="1950" max="2000" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3 "><span class="input-group-prepend "><span class="input-group-text">NIC  </span></span>
        <input value="<?php echo  $row_staff["nic"]?>"  type="text" name="nic" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">photo</span></span>
        <input value="<?php echo  $row_staff["photo"] ?>"  type="file" name="photo" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">position</span></span>
        <input value="<?php echo  $row_staff["position"] ?> " type="text" name="position" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">salary</span></span>
        <input value="<?php echo  $row_staff["salary"] ?>"  type="text" name="salary" class="form-control">
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
        <input value="<?php echo $row_staff["phone"] ?> " type="text" name="phone" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Email</span></span>
        <input value="<?php echo  $row_staff["email"] ?> " type="email" name="email" class="form-control">
    </div>
    <div class="form-group ">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Address</span></span>
        <input value="<?php echo  $row_staff["address"] ?> " type="text" name="address" class="form-control">
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
            <option <?php if($row_staff["department_id"]== $row_department["department_id"]) echo "selected" ?>  value="<?php echo $row_department["department_id"] ?>"><?php echo $row_department["department_name"]?></option>
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

