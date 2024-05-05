<?php
require_once "dbconnect.php";
require_once "is_admin.php";

if(!empty($_SESSION['user'])){
  $sql = $connection->prepare("SELECT * FROM workers WHERE email=? LIMIT 1");
  $sql->bind_param("s", $_SESSION['user']);
  $sql->execute();
  $users_data_db = $sql->get_result();
  $sql = $connection->prepare("SELECT position.position_name FROM workers INNER JOIN position ON workers.position=position.id WHERE email=? LIMIT 1");
  $sql->bind_param("s", $_SESSION['user']);
  $sql->execute();
  $user_pos_name_db = $sql->get_result();
}else{
  header("location: ../employees/signin.php", true, 301);
  exit;
};
?>
