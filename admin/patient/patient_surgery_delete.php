
<?php 

require_once("../connection.php");




$patient_surgery_id= getValue($_GET["patient_surgery_id"]);
$result=mysqli_query($con, "DELETE FROM `patient_surgery` WHERE `patient_surgery`.`patient_surgery_id` = $patient_surgery_id");

   if($result){
    header("location:patient_surgery_list.php?delete=done");
   }else{
    header("location:patient_surgery_list.php?error=field&patient_surgery_id=$patient_surgery_id");
   }


?>
   <?php require_once "../../inc/head.php"; ?>
   <?php include_once "../../inc/jsScript.php"; ?>
