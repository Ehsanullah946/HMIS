
<?php 

require_once("../checkLogin.php");
require_once("../connection.php");

$patient_surgery=mysqli_query($con, "SELECT * FROM patient_surgery INNER JOIN surgery ON surgery.surgery_id=patient_surgery.surgery_id 
inner join patient on patient.patient_id=patient_surgery.patient_id 
inner join staff on staff.staff_id = patient_surgery.staff_id");
$row_patient_surgery=mysqli_fetch_assoc($patient_surgery);

?>

<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>

<div class="row mt-5">   
    <div class="col-xl-12 col-lg-12 col-md-12 mt-5 p-4 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">patient surgery information</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">surgery name</th>
                            <th scope="col">patient name</th> 
                            <th scope="col">doctor name</th>
                            <th scope="col"> date</th>
                            <th scope="col">result</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php do{ ?>
                            <tr>
                                <th scope="row"> <?php echo $row_patient_surgery["patient_surgery_id"] ?></th>
                                <th scope="row"> <?php echo $row_patient_surgery["surgery_name"] ?></th>
                                <th scope="row"> <?php echo $row_patient_surgery["patient_name"] ?></th>
                                <th scope="row"> <?php echo $row_patient_surgery["first_name"] ?></th>
                                <th scope="row"> <?php echo $row_patient_surgery["date"] ?></th>
                                <th scope="row"> <?php echo $row_patient_surgery["surgery_result"] ?></th>
                                <td>
                                    <a href="patient_surgery_edit.php?patient_surgery_id=<?php echo $row_patient_surgery["patient_surgery_id"] ?> ">
                                        <span class="bi bi-pencil-square"></span>
                                    </a>
                                </td>
                                <td>
                                    <a class="delete" href="patient_surgery_delete.php?patient_surgery_id=<?php echo $row_patient_surgery["patient_surgery_id"] ?> ">
                                        <span class="bi bi-trash3"></span>
                                    </a>
                                </td>
                              
                            </tr>
                    <?php   }while($row_patient_surgery=mysqli_fetch_assoc($patient_surgery)); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require_once "../../inc/footer.php"; ?>
<?php include_once "../../inc/jsScript.php"; ?>