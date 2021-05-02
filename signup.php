<?php require_once 'configs/register.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "includes/head.php" ?>
  <link rel="stylesheet" href="css/register.css">
  <title>Sign in</title>
</head>
<body>
<?php require "includes/header.php" ?>
<section class="section">
  <div class="container text-center">
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
      <main class="form-signin mt-5">
        <form action="configs/register.php" method="POST">

          <img class="mb-4" src="img/e.png" alt="Logo" width="90">

          <!-- <label for="inputName" class="visually-hidden">Name</label> -->
          <input type="name" name="name" value="<?php if(isset($_SESSION['old_register_name'])){echo $_SESSION['old_register_name'];}else{echo '';}; ?>" id="inputName" class="form-control mb-1" placeholder="Enter your name" required="" autofocus="" autocomplete="on">

          <!-- <label for="inputEmail" class="visually-hidden">E-mail</label> -->
          <input type="email" name="email" value="<?php if(isset($_SESSION['old_register_email'])){echo $_SESSION['old_register_email'];}else{echo '';}; ?>" id="inputEmail" class="form-control mb-1" placeholder="Enter your Email" required="" autofocus="" autocomplete="on">

          <!-- <label for="inputPassword" class="visually-hidden">Password</label> -->
          <input type="password" name="password_1" id="inputPassword" class="form-control mt-1" placeholder="Enter your password" required="" autocomplete="on">

          <!-- <label for="confirmPassword" class="visually-hidden">Password confirmation</label> -->
          <input type="password" name="password_2" id="confirmPassword" class="form-control mt-1" placeholder="Confirm your password" required="" autocomplete="on">

          <input type="hidden" name="token" value="<?php if(isset($_SESSION['token'])){echo $_SESSION['token'];}else{echo '';}; ?>">

          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

        </form>
      </main>
  </div>
</section>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- <script src="js/cursor_pos_register.js"></script> -->
</body>
</html>
