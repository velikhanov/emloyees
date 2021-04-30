<?php
require_once "dbconnect.php";
require_once "is_admin.php";
require_once "block_no_admin.php";

if(!empty($_SESSION['user'])){
  $sql = $connection->prepare("SELECT id, name, email, admin, position, blocked, deleted FROM workers WHERE email!=?");
  $sql->bind_param("s", $_SESSION['user']);
  $sql->execute();
  $users_listdb = $sql->get_result();

  $users_list_pos = $connection->prepare("SELECT position.id, position.position_name FROM workers INNER JOIN position ON workers.position=position.id WHERE email!=? LIMIT 1");
  $sql->bind_param("s", $_SESSION['user']);
  $users_list_pos->execute();
  $users_list_posdb = $users_list_pos->get_result();
};
?>
