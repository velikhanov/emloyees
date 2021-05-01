<?php
require_once "dbconnect.php";
require_once "is_admin.php";
require_once "block_no_admin.php";

if(!empty($_SESSION['user'])){
  $sql = $connection->prepare("SELECT * FROM workers WHERE id=?");
  $sql->bind_param("i", $_GET['id']);
  $sql->execute();
  $admindb = $sql->get_result();

  $admnpos = $connection->prepare("SELECT * FROM position");
  $admnpos->execute();
  $admnposdb = $admnpos->get_result();

  if (empty($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(random_bytes(32));
    };
  if(isset($_POST['token'])){

    if($_POST['token']==$_SESSION['token']){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $existuser = $admindb->fetch_assoc();
        $userid = $_POST['userid'];
        $name = $_POST['name'];
        $surname = !empty($_POST['surname'])?$_POST['surname']:NULL;
        $age = !empty($_POST['age'])?$_POST['age']:NULL;
        $email = !empty($_POST['email'])?$_POST['email']:$existuser['email'];
        if(!empty($_POST['password_1'])){
          if($_POST['password_1'] !== $_POST['password_2']){
            $password = $existuser['password'];
            $_SESSION['err'] = 'Passwords must match!';
            header('location: ../admin_edit.php?id='.$existuser['id'], true, 301);
            exit;
          }else{
            $password = password_hash($_POST['password_1'], PASSWORD_DEFAULT);
          };
        }else{
          $password = $existuser['password'];
        };
        $admin = $_POST['admin'] ?? $existuser['admin'];
        if(!empty($_POST['position'])){
          $position = $_POST['position'];
        }else{
          $position = NULL;
        };
        $salary = !empty($_POST['salary'])?$_POST['salary']:NULL;
        if($_POST['blocked'] !== NULL){
          $blocked = $_POST['blocked'];
        }else{
          $blocked = $existuser['blocked'];
        };
        if($_POST['deleted'] !== NULL){
          $deleted = $_POST['deleted'];
        }else{
          $deleted = $existuser['deleted'];
        };
        $eml = $connection->prepare("SELECT email FROM workers WHERE email=? LIMIT 1");
        $eml->bind_param("s", $email);
        $eml->execute();
        $eml_db = $eml->get_result();
        $eml = $eml_db->fetch_assoc();
        if($existuser){
          if($existuser['email'] !== $email && $eml['email'] === $email){
            $_SESSION['err'] = "This E-mail already exist!";
            header('location: ../admin_edit.php?id='.$existuser['id'], true, 301);
            exit;
          }else{
            $upd = $connection->prepare("UPDATE workers SET name=?, surname=?, age=?, email=?, password=?, admin=?, position=?, salary=?, blocked=?, deleted=? WHERE id=?");
            $upd->bind_param("sssssissiii", $name, $surname, $age, $email, $password, $admin, $position, $salary, $blocked, $deleted, $userid);
            $upd->execute();
            $_SESSION['inf'] = 'Data has been successfuly changed!';
            header('location: ../admin_edit.php?id='.$existuser['id'], true, 301);
            exit;
          };
        };
      };
    }else{
      echo "Error checking CSRF token! Please try again later or contact the administration!";
    };
  };
};
?>
