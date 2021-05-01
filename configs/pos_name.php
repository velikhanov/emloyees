<?php
require_once "dbconnect.php";
require_once "is_admin.php";
require_once "block_no_admin.php";

  $pos_name = $connection->prepare("SELECT * FROM position");
  $pos_name->execute();
  $admnposdb = $pos_name->get_result();

  if (empty($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(random_bytes(32));
    };
  if(isset($_POST['token'])){

    if($_POST['token']==$_SESSION['token']){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){


      };
    }else{
      echo "Error checking CSRF token! Please try again later or contact the administration!";
    };
  };
?>
