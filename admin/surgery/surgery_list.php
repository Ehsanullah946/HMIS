
<?php 

require_once("../checkLogin.php");
require_once("../connection.php");

$surgery=mysqli_query($con, "SELECT *FROM surgery inner join department on department.department_id=surgery.department_id");
$row_surgery=mysqli_fetch_assoc($surgery);

?>

<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>

<div class="row mt-5">   
    <div class="col-xl-12 col-lg-12 col-md-12 mt-5 p-4 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">surgery List</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">surgery name</th>
                            <th scope="col">price</th> 
                            <th scope="col">department</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php do{ ?>
                            <tr>
                                <td scope="row"> <?php echo  $row_surgery["surgery_id"] ?></td>
                                <td scope="row"> <?php echo $row_surgery["surgery_name"] ?></td>
                                <td scope="row"> <?php echo $row_surgery["price"] ?></td>
                                <td scope="row"> <?php echo  $row_surgery["department_name"] ?></td>
                    
                            
                                <td>
                                    <a href="    .php?surgery_id=<?php echo $row_surgery["surgery_id"] ?> ">
                                        <span class="bi bi-pencil-square"></span>
                                    </a>
                                </td>
                                <td>
                                    <a class="delete" href="surgery_delete.php?surgery_id=<?php echo $row_surgery["surgery_id"] ?> ">
                                        <span class="bi bi-trash3"></span>
                                    </a>
                                </td>
                              
                            </tr>
                    <?php   }while($row_surgery=mysqli_fetch_assoc($surgery)); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require_once "../../inc/footer.php"; ?>
<?php include_once "../../inc/jsScript.php"; ?>