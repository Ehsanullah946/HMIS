<?php

if(!isset($_SESSION)) {
    session_start();
 }
 

function check_access($allowed_roles) {
    if (!isset($_SESSION["role"])) {
        header("Location: /HMIS/LoginForm.php");
        exit;
    }

    if (!in_array($_SESSION["role"], $allowed_roles)) {
        echo "<h3>Access Denied: You do not have permission to access this page.</h3>";
        exit;
    }
}
