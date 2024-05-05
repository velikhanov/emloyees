<?php
require_once 'dbconnect.php';
require_once 'is_admin.php';

if (!empty($_SESSION['user'])){
  require_once 'block_no_admin.php';

  $pos_name = $connection->prepare('SELECT * FROM position');
  $pos_name->execute();
  $admnposdb = $pos_name->get_result();

  if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
  };
  $input = json_decode(file_get_contents('php://input'), true);
  if (isset($input['token']) && $input['token'] == $_SESSION['token']){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      if (isset($input['action_type']) && $input['action_type'] == 'update') {
        $update_pos = $connection->prepare('UPDATE position SET position_name = ? WHERE id = ?');
        $update_pos->bind_param('si', $input['position_name'], $input['id']);
        $update_pos->execute();
        $update_pos->close();
      } else if (isset($input['action_type']) && $input['action_type'] == 'delete'){
        $delete_pos = $connection->prepare('DELETE FROM position WHERE id = ?');
        $delete_pos->bind_param('i', $input['id']);
        $delete_pos->execute();
        $delete_pos->close();
      } else {
        $add_pos = $connection->prepare('INSERT INTO position (id, position_name) VALUES (?,?)');
        $add_pos->bind_param('is', $input['id'], $input['position_name']);
        $add_pos->execute();
        $add_pos->close();
      };
    };
  } else {
    echo 'Error checking CSRF token! Please try again later or contact the administration!';
  };
};
?>
