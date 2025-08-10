
<?php 

require_once("../auth.php");
check_access(["admin"]);
require_once("../connection.php");


$department_id= getValue($_GET["department_id"]);
 $department=mysqli_query($con, "SELECT * FROM department WHERE department_id =$department_id");
 $row_department = mysqli_fetch_assoc($department); 
 

 if(isset($_POST["department_name"])){   
    $department_name=getValue($_POST["department_name"]);
   $result= mysqli_query($con, "UPDATE department SET  department_name='$department_name' WHERE department_id=$department_id");

   if($result){
    header("location:department_list.php?edit=done");
   }else{
    header("location:department_edit.php?error=field&department_id=$department_id");
   }
}


?>

<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>

<div class="col-xl-6 col-lg-6 col-md-12 mt-5 p-4 col-sm-12 col-12 mx-auto ">
        <div class="card mt-5">
            <h5 class="card-header text-white bg-primary">Edit Department</h5>
            <div class="card-body">
    <form action="" method="POST" class="mt-5">
    <div class="form-group mt-5">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Edit Department</span></span>
        <input type="text" name="department_name" value="<?php echo $row_department["department_name"] ?> "  class="form-control">
    </div>
    <input type="submit" class="btn btn-primary" value="Save changes">
      </div>
     </form>
    </div>
   </div>
</div>




<?php require_once "../../inc/footer.php"; ?>
<?php include_once "../../inc/jsScript.php"; ?>