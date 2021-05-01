<?php
require_once "dbconnect.php";
require_once "is_admin.php";

$current_user = isset($_SESSION['user']) ? $_SESSION['user'] : '';
if(empty($current_user)){
  header("location: ../signin.php", true, 301);
  exit;
};
if(!empty($current_user)){
  $sql = $connection->prepare("SELECT * FROM workers WHERE email=? LIMIT 1");
  $sql->bind_param("s", $current_user);
  $sql->execute();
  $users_data_db = $sql->get_result();
  $sql = $connection->prepare("SELECT position.position_name FROM workers INNER JOIN position ON workers.position=position.id WHERE email=? LIMIT 1");
  $sql->bind_param("s", $current_user);
  $sql->execute();
  $user_pos_name_db = $sql->get_result();
};
?>
