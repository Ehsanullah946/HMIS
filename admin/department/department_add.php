
<?php 
require_once("../auth.php");
check_access(["admin"]);

require_once("../connection.php");

if(isset($_POST["department_name"])){
   
    $department_name=htmlspecialchars($_POST["department_name"]);
    
     $result= mysqli_query($con, "INSERT INTO department VALUE(null,'$department_name')");

   if($result){
    header("location:department_list.php?add=done");
   }else{
    header("location:department_add.php?add=field");
   }
}

?>

<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>

<div class="col-xl-6 col-lg-6 col-md-12 mt-5 p-4 col-sm-12 col-12 mx-auto ">
        <div class="card mt-5">
            <h5 class="card-header text-white bg-primary">Department List</h5>
            <div class="card-body">
    <form action="" method="POST" class="mt-5">
    <div class="form-group mt-5">
        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Department Name</span></span>
        <input type="text" name="department_name"  class="form-control">
    </div>
    <input type="submit" class="btn btn-primary" value="add department">
      </div>
     </form>
    </div>
   </div>
</div>

<?php require_once "../../inc/footer.php"; ?>
<?php include_once "../../inc/jsScript.php"; ?>