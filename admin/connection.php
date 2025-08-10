<?php
       if(!isset($_SESSION)){
     
        session_start();
     }

  $con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"HMIS");

  function getValue($value){
    global $con;
    return mysqli_real_escape_string($con,$value);
  }


?>