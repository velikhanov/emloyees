<?php
session_start();
if(empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
};
if(isset($_POST['token'])){
if($_POST['token']==$_SESSION['token']){
  if(!empty($_SESSION['user'])){
    unset($_SESSION['user']);
  };
  if(!empty($_SESSION['is_admin'])){
      unset($_SESSION['is_admin']);
  }
  header('location: ../signin.php', true, 301);
  exit;
}else{

  echo "Error checking CSRF token! Please try again later or contact the administration!";

};
};
?>
