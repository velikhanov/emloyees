<?php include "configs/users_data.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "includes/head.php" ?>
  <link rel="stylesheet" href="css/edit.css">
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
            if (isset($_SESSION['inf'])) {
              unset($_SESSION['inf']);
            };
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
      <form action="configs/users_data.php" method="POST">
        <table class="table table-success table-striped w-75 text-center">
            <tbody>
              <?php while($edit = $edit_db->fetch_assoc()) { ?>
              <!-- <tr>
                <th scope="row">#</th>
                <td></td>
              </tr> -->
              <tr>
                <td colspan="2"><a class="btn btn-info" href="personal_area.php"><i class="fas fa-backward"></i> Cancel</a></td>
              </tr>
              <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="name" value="<?= $edit['name']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Surname</th>
                <td><input type="text" name="surname" placeholder="Surname" value="<?= $edit['surname']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Age</th>
                <td><input type="number" name="age" min="1" placeholder="Age" value="<?= $edit['age']; ?>"></td>
              </tr>
              <tr>
                <th scope="row">E-Mail</th>
                <td><input type="email" name="email" value="<?= $edit['email']; ?>"></td>
              </tr>
              <tr>
                <th scope="row" class="align-middle">Change password</th>
                <td>
                  <a class="pswchbtn btn btn-warning" href="#">Click to change</a>
                  <a class="pswclbtn pswchange btn btn-danger" href="#">Cancel</a>
                  <input class="pswchange w-50 mb-1" type="password" name="oldpass" placeholder="Old password" autocomplete>
                  <input class="pswchange w-50 mb-1" type="password" name="password_1" placeholder="New password" autocomplete>
                  <input class="pswchange w-50" type="password" name="password_2" placeholder="Password confirmation" autocomplete>
                </td>
              </tr>
              <tr>
                <th scope="row">Position</th>
                <td>
                <select name="position">
                  <option value="" <?= $edit['position'] === NULL ? 'selected' : NULL; ?>>-</option>
                  <?php while($datapos = $user_pos_name_db->fetch_assoc()) { ?>
                    <option value="<?= $datapos['id']; ?>" <?= $edit['position'] === $datapos['id'] ? 'selected' : NULL; ?>><?= $datapos['position_name']; ?></option>
                  <?php }; ?>
                </select>
              </td>
              </tr>
              <tr>
                <th scope="row">Salary</th>
                <td><input type="number" min="1" name="salary" placeholder="Salary" value="<?= $edit['salary']; ?>"></td>
              </tr>
          <tr>
            <td colspan="2">
              <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
              <input type="hidden" name="userid" value="<?= $edit['id']; ?>">
              <input type="submit" class="btn btn-success" value="Save">
            </td>
          </tr>
      <?php };
      // $connection->close();
       ?>
          </tbody>
        </table>
      </form>
      </div>
  </section>
  <?php require "includes/footer.php" ?>

<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/psw.js"></script>
</body>
</html>
