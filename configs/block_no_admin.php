<?php
$sql = $connection->prepare("SELECT admin FROM workers WHERE email=? LIMIT 1");
$sql->bind_param("s", $_SESSION['user']);
$sql->execute();
$block_no_admindb = $sql->get_result();
$block_no_admin = $block_no_admindb->fetch_assoc();
if($block_no_admin['admin'] !== 2 && $block_no_admin['admin'] !== 1){
  header("location: ../personal_area.php", true, 301);
  exit;
};
?>
