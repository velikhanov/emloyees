<?php include "configs/per_area.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "includes/head.php" ?>
  <link rel="stylesheet" href="css/personal_area.css">
  <title>Presonal area</title>
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
          <tbody>

          <?php while($data = $users_data_db->fetch_assoc()) { ?>
            <!-- <tr>
              <th scope="row">#</th>
              <td></td>
            </tr> -->
            <tr>
              <td colspan="2"><a class="btn btn-info" href="user_edit.php"><i class="fas fa-edit"></i> Edit information</a></td>
            </tr>
            <tr>
              <th scope="row">Name</th>
              <td><?= $data['name']; ?></td>
            </tr>
            <tr>
              <th scope="row">Surname</th>
              <td><?= $data['surname'] ?? '-'; ?></td>
            </tr>
            <tr>
              <th scope="row">Age</th>
              <td><?= $data['age'] ?? '-'; ?></td>
            </tr>
            <tr>
              <th scope="row">E-Mail</th>
              <td><?= $data['email'] ?? '-'; ?></td>
            </tr>
            <tr>
              <th scope="row">Position</th>
            <?php if($data['position'] !== NULL){
              while($datapos = $user_pos_name_db->fetch_assoc()) { ?>
              <td><?= $datapos['position_name']; ?></td>
            <?php }; }else{?>
              <td>-</td>
            <?php }; ?>
            </tr>
            <tr>
              <th scope="row">Salary</th>
              <td><?= $data['salary'] ?? '-'; ?></td>
            </tr>
        <?php };
          $connection->close();
         ?>
        </tbody>

      </table>
      </div>
  </section>
  <?php require "includes/footer.php" ?>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
