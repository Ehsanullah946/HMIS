
<?php 

require_once("../checkLogin.php");
require_once("../connection.php");

$patient=mysqli_query($con, "SELECT *FROM patient ");
$row_patient=mysqli_fetch_assoc($patient);




?>

<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>

<div class="row mt-5">   
    <div class="col-xl-12 col-lg-12 col-md-12 mt-5 p-4 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">patient List</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">patient name</th>
                            <th scope="col">gender</th> 
                            <th scope="col">phone</th>
                            <th scope="col">regester date</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php do{ ?>
                            <tr>
                                <th scope="row"> <?php echo  $row_patient["patient_id"] ?></th>
                                <th scope="row"> <?php echo $row_patient["patient_name"] ?></th>
                                <th scope="row"> <?php if($row_patient["gender"] == 1){ echo "male";}else{echo "famale";} ?></th>
                                <th scope="row"> <?php echo $row_patient["phone"] ?></th>
                                <th scope="row"> <?php echo  $row_patient["regester_date"] ?></th>
                                <td>
                                    <a href="patient_edit.php?patient_id=<?php echo $row_patient["patient_id"] ?> ">
                                        <span class="bi bi-pencil-square"></span>
                                    </a>
                                </td>
                                <td>
                                    <a class="delete" href="patient_delete.php?patient_id=<?php echo $row_patient["patient_id"] ?> ">
                                        <span class="bi bi-trash3"></span>
                                    </a>
                                </td>
                              
                            </tr>
                    <?php   }while($row_patient=mysqli_fetch_assoc($patient)); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require_once "../../inc/footer.php"; ?>
<?php include_once "../../inc/jsScript.php"; ?>