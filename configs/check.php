<?php
$sql = $connection->prepare("SELECT admin, blocked, deleted FROM workers WHERE email=? LIMIT 1");
$sql->bind_param("s", $_SESSION['user']);
$sql->execute();
$is_admindb = $sql->get_result();
$is_admin = $is_admindb->fetch_assoc();

if($is_admin['admin'] !== 2 && $is_admin['deleted'] === 1 && $is_admin['blocked'] === 1){
  if(!empty($_SESSION['user'])){
    unset($_SESSION['user']);
  };
  if(!empty($_SESSION['is_admin'])){
    unset($_SESSION['is_admin']);
  };
  $_SESSION['err'] = "Access denied because your account has been blocked and queued for deletion! If you think this is unlawful, contact the administration!";
  header('location: ../signin.php', true, 301);
  exit;
}else if($is_admin['admin'] !== 2 && $is_admin['deleted'] === 1){
  if(!empty($_SESSION['user'])){
    unset($_SESSION['user']);
  };
  if(!empty($_SESSION['is_admin'])){
    unset($_SESSION['is_admin']);
  };
    $_SESSION['err'] = "Access denied because your account has been blocked and queued for deletion! If you think this is unlawful, contact the administration!";
    header('location: ../signin.php', true, 301);
    exit;
  }else if($is_admin['admin'] !== 2 && $is_admin['blocked'] === 1){
    if(!empty($_SESSION['user'])){
      unset($_SESSION['user']);
    };
    if(!empty($_SESSION['is_admin'])){
      unset($_SESSION['is_admin']);
    };
    $_SESSION['err'] = "Access denied because your account has been blocked! If you think this is unlawful, contact the administration!";
    header('location: ../signin.php', true, 301);
    exit;
  };

  if(($is_admin['admin']) !== 0){
    if(!empty($_SESSION['is_admin'])){
      unset($_SESSION['is_admin']);
    };
    if($is_admin['admin'] === 2){
      $_SESSION['is_admin'] = 2;
    }else if($is_admin['admin'] === 1 && $is_admin['blocked'] !== 1 && $is_admin['deleted'] !== 1){
      $_SESSION['is_admin'] = 1;
    }else{
      if(!empty($_SESSION['is_admin'])){
        unset($_SESSION['is_admin']);
      };
    };
  }else{
    if(!empty($_SESSION['is_admin'])){
      unset($_SESSION['is_admin']);
    };
  };
?>
