<?php


require_once "admin/connection.php"; 
unset($_SESSION["user_id"]);
unset($_SESSION['role']);
 header("location:/HMIS/LoginForm.php?logout=true");
session_destroy();
?>