<?php include "configs/admin_edit.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "includes/head.php" ?>
  <link rel="stylesheet" href="css/admin_edit.css">
  <title>Edit form</title>
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
      <?php }else if(isset($_SESSION['inf'])){ ?>
        <div class="alert alert-warning text-center alertsmargin" role="alert">
          <strong>
            <?php
            echo $_SESSION['inf'];
            unset($_SESSION['inf']);
             ?>
          </strong>
        </div>
        <?php }; ?>
      <?php while($is_admin = $admindb->fetch_assoc()) { ?>
      <form action="configs/admin_edit.php?id=<?= $is_admin['id']; ?>" method="POST">
        <table class="table table-success table-striped w-75 text-center">
            <tbody>
              <tr>
                <td colspan="2">
                  <a class="btn btn-info" href="admin_users_list.php"><i class="fas fa-backward"></i> Cancel</a>
                  <!-- <a class="btn btn-info" href="position_name.php"><i class="fas fa-edit"></i> Edit positions</a> -->
                </td>
              </tr>
              <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="name" value="<?= $is_admin['name']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Surname</th>
                <td><input type="text" name="surname" placeholder="Surname" value="<?= $is_admin['surname']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Age</th>
                <td><input type="number" name="age" min="1" placeholder="Age" value="<?= $is_admin['age']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">E-Mail</th>
                <td><input type="email" name="email" value="<?= $is_admin['email']; ?>"></td>
              </tr>
              <tr>
                <th scope="row" class="align-middle">Change password</th>
                <td>
                  <a class="pswchbtn btn btn-warning" href="#">Click to change</a>
                  <a class="pswclbtn pswchange btn btn-danger" href="#">Cancel</a>
                  <input class="pswchange w-50 mb-1" type="password" name="password_1" placeholder="New password" autocomplete value="<?php if($is_admin['admin'] === 2){echo NULL;}; ?>">
                  <input class="pswchange w-50" type="password" name="password_2" placeholder="Password confirmation" autocomplete value="<?php if($is_admin['admin'] === 2){echo NULL;}; ?>">
                </td>
              </tr>
              <?php if($_SESSION['is_admin'] === 2){ ?>
              <tr>
                <th scope="row">Status</th>
                <td>
                <select name="admin">
                    <option value="<?= $is_admin['admin'] === 2 ? 2 : 0;?>" <?= $is_admin['admin'] === 0 ? 'selected' : NULL; ?>>Regular user</option>
                    <option value="<?= $is_admin['admin'] === 2 ? 2 : 1;?>" <?= $is_admin['admin'] === 1 ? 'selected' : NULL; ?>>Admin</option>
                    <option value="<?= $is_admin['admin'] === 2 ? 2 : 2;?>" <?= $is_admin['admin'] === 2 ? 'selected' : NULL; ?> disabled>Hello, CEO!</option>
                </select>
              </td>
              </tr>
              <?php };?>
              <tr>
                <th scope="row">Position</th>
                <td>
                <select name="position">
                  <option value="" <?= $is_admin['position'] === NULL ? 'selected' : NULL; ?>>-</option>
                  <?php while($admnp = $admnposdb->fetch_assoc()) { ?>
                    <option value="<?= $admnp['id']; ?>" <?= $is_admin['position'] === $admnp['id'] ? 'selected' : NULL; ?>><?= $admnp['position_name']; ?></option>
                  <?php }; ?>
                </select>
              </td>
              </tr>
              <tr>
                <th scope="row">Salary</th>
                <td><input type="number" min="1" name="salary" placeholder="Salary" value="<?= $is_admin['salary']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Lock status</th>
                <td>
                  <select name="blocked">
                    <option value="<?php
                    if($is_admin['admin'] === 2){
                      echo "0";
                    }else if($is_admin['admin'] === 1){
                      echo "0";
                    }else{
                      echo "0";
                    };?>" <?= $is_admin['blocked'] === 0 ? 'selected' : NULL; ?>>Active</option>
                    <option value="<?php
                    if($is_admin['admin'] === 2){
                      echo "0";
                    }else if($is_admin['admin'] === 1){
                      echo "0";
                    }else{
                      echo "1";
                    };?>" <?= $is_admin['blocked'] === 1 ? 'selected' : NULL; ?>>Blocked</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Delete status</th>
                <td>
                  <select name="deleted">
                    <option value="<?php
                    if($is_admin['admin'] === 2){
                      echo "0";
                    }else if($is_admin['admin'] === 1){
                      echo "0";
                    }else{
                      echo "0";
                    };?>" <?= $is_admin['deleted'] === 0 ? 'selected' : NULL; ?>>Active</option>
                    <option value="<?php
                    if($is_admin['admin'] === 2){
                      echo "0";
                    }else if($is_admin['admin'] === 1){
                      echo "0";
                    }else{
                      echo "1";
                    };?>" <?= $is_admin['deleted'] === 1 ? 'selected' : NULL; ?>>Deleted</option>
                  </select>
                </td>
              </tr>
          <tr>
            <td colspan="2">
              <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
              <input type="hidden" name="userid" value="<?= $is_admin['id']; ?>">
              <input type="submit" class="btn btn-success" value="Save">
            </td>
          </tr>
          </tbody>
        </table>
      </form>
    <?php };
    $connection->close();
     ?>
      </div>
  </section>
  <?php require "includes/footer.php" ?>

<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/psw-admin.js"></script>
</body>
</html>
