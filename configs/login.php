<?php
require_once 'dbconnect.php';
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
  };
  if(isset($_POST['token'])){
  if($_POST['token']==$_SESSION['token']){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $sql = $connection->prepare("SELECT email, password, admin, blocked, deleted FROM workers WHERE email=?");
      $sql->bind_param("s", $_POST['email']);
      $sql->execute();
      $user = $sql->get_result()->fetch_assoc();

      if($user['admin'] !== 2 && $user['deleted'] === 1 && $user['blocked'] === 1){
        if(!empty($_SESSION['user'])){
          unset($_SESSION['user']);
        };
        if(!empty($_SESSION['is_admin'])){
          unset($_SESSION['is_admin']);
        };
        $_SESSION['err'] = "Access denied because your account has been blocked and queued for deletion! If you think this is unlawful, contact the administration!";
        $_SESSION['old_login'] = $_POST['email'];
        header('location: ../signin.php', true, 301);
        exit;
      }else if($user['admin'] !== 2 && $user['deleted'] === 1){
        if(!empty($_SESSION['user'])){
          unset($_SESSION['user']);
        };
        if(!empty($_SESSION['is_admin'])){
          unset($_SESSION['is_admin']);
        };
        $_SESSION['err'] = "Access denied because your account has been blocked and queued for deletion! If you think this is unlawful, contact the administration!";
        $_SESSION['old_login'] = $_POST['email'];
        header('location: ../signin.php', true, 301);
        exit;
      }else if($user['admin'] !== 2 && $user['blocked'] === 1){
        if(!empty($_SESSION['user'])){
          unset($_SESSION['user']);
        };
        if(!empty($_SESSION['is_admin'])){
          unset($_SESSION['is_admin']);
        };
        $_SESSION['err'] = "Access denied because your account has been blocked! If you think this is unlawful, contact the administration!";
        $_SESSION['old_login'] = $_POST['email'];
        header('location: ../signin.php', true, 301);
        exit;
      }else{
      if (isset($user) && password_verify($_POST['password'], $user['password'])){
        $_SESSION['user'] = $_POST['email'];
        if(($user['admin']) !== 0){
          if(!empty($_SESSION['is_admin'])){
            unset($_SESSION['is_admin']);
          };
          if($user['admin'] === 2){
            $_SESSION['is_admin'] = 2;
          }else if($user['admin'] === 1 && $user['blocked'] !== 1 && $user['deleted'] !== 1){
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
        if(isset($_SESSION['old_login'])){unset($_SESSION['old_login']);}else{'';};
        header('location: ../personal_area.php', true, 301);
        exit;
      } else {
        $_SESSION['err'] = 'Wrong login or password!';
        $_SESSION['old_login'] = $_POST['email'];
        header('location: ../signin.php', true, 301);
        exit;
      };
      $sql->free_result();
      // $user->free_result();
      $connection->close();
    };
  };
}else{

    echo "Error checking CSRF token! Please try again later or contact the administration!";

  };
};
  if(isset($_SESSION['user'])){
    header("location: ../personal_area.php", true, 301);
    exit;
  };
?>
