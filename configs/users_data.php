<?php
require_once "dbconnect.php";
require_once "is_admin.php";
// $current_user = isset($_SESSION['user']) ? $_SESSION['user'] : '';
if(empty($_SESSION['user'])){
  header("location: ../signin.php");
};
if(!empty($_SESSION['user'])){
  $sql = $connection->prepare("SELECT * FROM workers WHERE email=? LIMIT 1");
  $sql->bind_param("s", $_SESSION['user']);
  $sql->execute();
  $edit_db = $sql->get_result();
  $sql = $connection->prepare("SELECT id, position_name FROM position");
  // $sql->bind_param("s", $current_user);SELECT position.position_name FROM workers INNER JOIN position ON workers.position=position.id
  $sql->execute();
  $user_pos_name_db = $sql->get_result();

  if (empty($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(random_bytes(32));
    };
  if(isset($_POST['token'])){
    if($_POST['token']==$_SESSION['token']){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $existuser = $edit_db->fetch_assoc();
        $userid = $_POST['userid'];
        $name = $_POST['name'];
        $surname = !empty($_POST['surname'])?$_POST['surname']:NULL;
        $age = !empty($_POST['age'])?$_POST['age']:NULL;
        $email = !empty($_POST['email'])?$_POST['email']:$_SESSION['user'];
        if(!empty($_POST['oldpass'])){
          if(!password_verify($_POST['oldpass'], $existuser['password'])){
            $_SESSION['err'] = 'Wrong old password!';
            header('location: ../user_edit.php');
          }else if($_POST['password_1'] !== $_POST['password_2']){
            $_SESSION['err'] = 'Passwords must match!';
            header('location: ../user_edit.php');
          }else{
            $password = password_hash($_POST['password_1'], PASSWORD_DEFAULT);
          };
        }else{
          $password = $existuser['password'];
        };
        $admin = $existuser['admin'];
        if(!empty($_POST['position'])){
          $position = $_POST['position'];
        }else{
          $position = NULL;
        };
        $salary = !empty($_POST['salary'])?$_POST['salary']: NULL;
        $blocked = $existuser['blocked'];
        $deleted = $existuser['deleted'];
        $eml = $connection->prepare("SELECT email FROM workers WHERE email=? LIMIT 1");
        $eml->bind_param("s", $email);
        $eml->execute();
        $eml_db = $eml->get_result();
        $eml = $eml_db->fetch_assoc();
        if($existuser){
          if($_SESSION['user'] !== $email && $eml['email'] === $email){
            $_SESSION['err'] = "This E-mail already exist!";
            header('location: ../user_edit.php');
          }else{
            $upd = $connection->prepare("UPDATE workers SET name=?, surname=?, age=?, email=?, password=?, admin=?, position=?, salary=?, blocked=?, deleted=? WHERE id=?");
            $upd->bind_param("sssssissiii", $name, $surname, $age, $email, $password, $admin, $position, $salary, $blocked, $deleted, $userid);
            $upd->execute();
            $_SESSION['user'] = $email;
            $_SESSION['inf'] = 'Your data has been successfuly changed!';
            header('location: ../user_edit.php');
          };
        };
      };
    }else{
      echo "Error checking CSRF token! Please try again later or contact the administration!";
    };
  };
};
?>
