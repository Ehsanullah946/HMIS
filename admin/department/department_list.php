<?php require_once("../connection.php") ?>
<?php 
require_once("../auth.php");
check_access(["admin"]);


   $department= mysqli_query($con, "SELECT * FROM department");
    $row_department= mysqli_fetch_assoc($department);


    // var_dump($row_department);
    // die;


    
   


?>
<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>
<div class="row mt-5">   
    <div class="col-xl-8 col-lg-8 col-md-12 mt-5 p-4 col-sm-12 mx-auto col-12">
        <div class="card">
            <h5 class="card-header bg-primary text-white">Department List</h5>
            <div class="card-body ">
                <?php if(isset($_GET["add"])){ ?>
                  <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
                    new department added successfuly!
                  </div>
               <?php } ?>
                <?php if(isset($_GET["edit"])){ ?>
                  <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
                    Department edited Successfully 👍
                  </div>
               <?php } ?>
                <?php if(isset($_GET["delete"])){ ?>
                  <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
                    Department deleted Successfully 👍
                  </div>
               <?php } ?>
                <?php if(isset($_GET["error"])){ ?>
                  <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
                    Department deos not deleted ❌
                  </div>
               <?php } ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">department Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php do{ ?>
                            <tr>
                                <th scope="row"><?php echo $row_department["department_id"] ?></th>
                                <td><?php echo $row_department["department_name"] ?></td>
                                
                                <td>
                                    <a href="department_edit.php?department_id=<?php echo $row_department["department_id"] ?> ">
                                        <span class="bi bi-pencil-square"></span>
                                    </a>
                                </td>
                                <td>
                                    <a class="delete" href="department_delete.php?department_id=<?php echo $row_department["department_id"] ?> ">
                                        <span class="bi bi-trash3"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php }  while($row_department= mysqli_fetch_assoc($department)) ?>   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require_once "../../inc/footer.php"; ?>
<?php include_once "../../inc/jsScript.php"; ?>