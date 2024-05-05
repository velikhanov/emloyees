<?php include "configs/users_list.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "includes/head.php" ?>
  <link rel="stylesheet" href="css/personal_area.css">
  <title>Employees</title>
</head>
<body>

  <?php require "includes/header.php" ?>
  <section class="section">
    <div class="bd-example">
      <?php if(isset($_SESSION['err'])){
        ?>
        <div class="alert alert-danger text-center alertsmargin" role="alert">
          <strong>
            <?php
            echo $_SESSION['err'];
            unset($_SESSION['err']);
             ?>
          </strong>
        </div>
        <?php }; ?>
      <table class="table table-success table-striped w-75 text-center">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Status</th>
            <th>Position</th>
            <th>Lock status</th>
            <th>Delete status</th>
            <th>Change users data</th>
          </tr>
        </thead>
          <tbody>
            <?php while ($users_list = $users_listdb->fetch_assoc()) { ?>
              <tr>
                <td><?= $users_list['id']; ?></td>
                <td><?= $users_list['name']; ?></td>
                <td><?= $users_list['email']; ?></td>
                <td><?= ($users_list['admin'] === 2) ? 'CEO' : ($users_list['admin'] === 1 ? 'Admin!' : 'Regular user'); ?></td>
                <?php if($users_list['position'] !== NULL){
                while($users_list_p = $users_list_posdb->fetch_assoc()){?>
                  <td><?= $users_list_p['position_name']; ?></td>
                <?php };
                }else{?>
                <td>-</td>
                <?php }; ?>
                <td><?= $users_list['blocked'] === 0 ? 'Active' : 'Blocked'; ?></td>
                <td><?= $users_list['deleted'] === 0 ? 'Active' : 'Deleted';; ?></td>
                <td><a class="btn btn-info" href="admin_edit.php?id=<?= $users_list['id'] ?>"><i class="fas fa-edit"></i> Edit users information</a></td>

              </tr>
              <?php }; ?>
        </tbody>

      </table>
      </div>
  </section>
  <?php require "includes/footer.php" ?>

<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
