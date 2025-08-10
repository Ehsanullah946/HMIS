
<?php 

require_once("../connection.php");




$patient_id= getValue($_GET["patient_id"]);
$result=mysqli_query($con, "DELETE FROM `patient` WHERE `patient`.`patient_id` = $patient_id");

   if($result){
    header("location:patient_list.php?delete=done");
   }else{
    header("location:patient_list.php?error=field&patient_id=$patient_id");
   }


?>
   <?php require_once "../../inc/head.php"; ?>
   <?php include_once "../../inc/jsScript.php"; ?>
