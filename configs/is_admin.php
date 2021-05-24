<?php
 if(empty($_SESSION['user'])){
   header("location: ../employees/signin.php", true, 301);
   exit;
 }else{
  require_once "check.php";
 };
?>
