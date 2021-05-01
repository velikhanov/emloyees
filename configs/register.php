<?php
require_once 'dbconnect.php';
require_once "is_admin.php";
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
  };
  if(isset($_POST['token'])){
  if($_POST['token']==$_SESSION['token']){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $name = "";
      $email = "";
      $password = "";
      if($_POST['name'] == NULL){
        $_SESSION['err'] = "Name field if required!";
        $_SESSION['old_register_name'] = $_POST['name'];
        header('location: ../signup.php', true, 301);
        exit;
      }else if($_POST['email'] == NULL){
        $_SESSION['err'] = "E-mail field is required!";
        $_SESSION['old_register_email'] = $_POST['email'];
        header('location: ../signup.php', true, 301);
        exit;
      }else if($_POST['password_1'] == NULL || $_POST['password_2'] == NULL){
        $_SESSION['err'] = "Fields password and password confirm are required!";
        header('location: ../signup.php', true, 301);
        exit;
      }else if($_POST['password_1'] != $_POST['password_2']){
        $_SESSION['err'] = "Passwords must match!";
        header('location: ../signup.php', true, 301);
        exit;
      }else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password_1'], PASSWORD_DEFAULT);
      $sql = $connection->prepare("SELECT email FROM workers WHERE email=? LIMIT 1");
      $sql->bind_param("s", $email);
      $sql->execute();
      $emaildb = $sql->get_result();
      $existuser = $emaildb->fetch_assoc();
      if($existuser){
        if ($existuser['email'] === $email) {
          $_SESSION['err'] = "This E-mail already exist!";
          $_SESSION['old_register_name'] = $name;
          $_SESSION['old_register_email'] = $email;
          header('location: ../signup.php', true, 301);
          exit;
        };
      }else{
        $sql = $connection->prepare("INSERT INTO workers (name, email, password) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $name, $email, $password);
        $sql->execute();
        $_SESSION['user'] = $email;
        unset($_SESSION['old_register_name']);
        unset($_SESSION['old_register_email']);
        header("location: ../personal_area.php", true, 301);
        exit;
      };
      $sql->close();
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
