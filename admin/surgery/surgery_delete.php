
<?php 

require_once("../connection.php");




$surgery_id= getValue($_GET["surgery_id"]);
$result=mysqli_query($con, "DELETE FROM `surgery` WHERE `surgery`.`surgery_id` = $surgery_id");

   if($result){
    header("location:surgery_list.php?delete=done");
   }else{
    header("location:surgery_list.php?error=field&surgery_id=$surgery_id");
   }


?>
   <?php require_once "../../inc/head.php"; ?>
   <?php include_once "../../inc/jsScript.php"; ?>
