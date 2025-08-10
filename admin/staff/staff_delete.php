
<?php 

require_once("../connection.php");




$staff_id= getValue($_GET["staff_id"]);

$staff_photo=mysqli_query($con, "SELECT  * from staff where staff_id=$staff_id");
$row_staff_photo= mysqli_fetch_assoc($staff_photo);
unlink($row_staff_photo["photo"]);

$result=mysqli_query($con, "DELETE FROM `staff` WHERE `staff`.`staff_id` = $staff_id");



   if($result){
    header("location:staffList.php?delete=done");
   }else{
    header("location:staffList.php?error=field&staff_id=$staff_id");
   }


?>
   <?php require_once "../../inc/head.php"; ?>
   <?php include_once "../../inc/jsScript.php"; ?>
