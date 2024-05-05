<?php include "configs/pos_name.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "includes/head.php" ?>
  <link rel="stylesheet" href="css/edit.css">
  <title>Positions</title>
</head>
<body>
  <style>
    .table-responsive {
      max-height: 300px;
      overflow-y: scroll;
    }
  </style>
  <?php require "includes/header.php" ?>
    <section class="section">
      <div class="bd-example">
        <?php if (isset($_SESSION['err'])){ ?>
          <div class="alert alert-danger text-center alertsmargin" role="alert">
            <strong>
              <?php
                echo $_SESSION['err'];
                unset($_SESSION['err']);
              ?>
            </strong>
          </div>
        <?php }; ?>
        <div class="table-responsive">
        <table class="table table-success table-striped w-75 text-center">
        <tbody>
          <tr>
            <td colspan="3">
              <a class="btn btn-info" href="admin_users_list.php"><i class="fas fa-backward"></i> Cancel</a>
            </td>
          </tr>
        <?php while($admnpos = $admnposdb->fetch_assoc()) { ?>
          <tr>
            <td class="align-middle">
              <?= $admnpos['id']; ?>
            </td>
              <td class="align-middle">
                <input type="text" name="position_name[]" value="<?= $admnpos['position_name']; ?>">
              </td>
              <td class="d-flex justify-content-center">
                <div class="input-group-append">
                  <button type="button" class="updateRow btn btn-warning">Update</button>
                  <button type="button" class="removeRow btn btn-danger">Delete</button>
                </div>
              </td>
          </tr>
          <?php }; $connection->close(); ?>
          <tr id="newRow"></tr>
          <tr>
            <td colspan="3">
              <button id="addRow" type="button" class="btn btn-info">Add field</button>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
              <input type="hidden" name="lastId" value="<?= $admnposdb->num_rows; ?>">
            </td>
          </tr>
          </tbody>
        </table>
        </div>
        </div>
    </section>
  <?php require "includes/footer.php" ?>

<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/addinput.js"></script>
</body>
</html>
