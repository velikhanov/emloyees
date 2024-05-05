<?php
require_once "dbconnect.php";
require_once "is_admin.php";

if(!empty($_SESSION['user'])){
require_once "block_no_admin.php";
// User ID's
$admidb = $connection->prepare("SELECT admin FROM workers WHERE email=?");
$admidb->bind_param("s", $_SESSION['user']);
$admidb->execute();
$admid = $admidb->get_result()->fetch_assoc();
$admidb->free_result();
$id = $admid['admin'];
  $main_admin_id = 2;
  $admin_id = 1;
  if($id === 1){
    $sql = "SELECT id, name, email, admin, position, blocked, deleted FROM workers WHERE email!=? AND admin!=? AND admin!=?";
  }else if($id === 2){
    $sql = "SELECT id, name, email, admin, position, blocked, deleted FROM workers WHERE email!=?";
  };
  $sql = $connection->prepare($sql);
  if($id === 1){
    $sql->bind_param("sii", $_SESSION['user'], $main_admin_id, $admin_id);
  }else if($id === 2){
    $sql->bind_param("s", $_SESSION['user']);
  };
  $sql->execute();
  $users_listdb = $sql->get_result();
  $sql->free_result();

  if($id === 1){
    $users_list_pos = "SELECT position.id, position.position_name FROM workers INNER JOIN position ON workers.position=position.id WHERE email!=? AND admin!=? AND admin!=? LIMIT 1";
  }else if($id === 2){
    $users_list_pos = "SELECT position.id, position.position_name FROM workers INNER JOIN position ON workers.position=position.id WHERE email!=? LIMIT 1";
  };
  $users_list_pos = $connection->prepare($users_list_pos);
  if($id === 1){
    $users_list_pos->bind_param("sii", $_SESSION['user'], $main_admin_id, $admin_id);
  }else if($id === 2){
    $users_list_pos->bind_param("s", $_SESSION['user']);
  };
  $users_list_pos->execute();
  $users_list_posdb = $users_list_pos->get_result();
  $users_list_pos->free_result();
};
?>
