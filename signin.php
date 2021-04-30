<?php require_once 'configs/login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "includes/head.php" ?>
  <link rel="stylesheet" href="css/login.css">
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
        <form action="configs/login.php" method="POST">

          <img class="mb-4" src="img/e.png" alt="Logo" width="90">

          <!-- <label for="inputEmail" class="visually-hidden">E-mail</label> -->
          <input type="email" name="email" value="<?= isset($_SESSION['old_login']) ? $_SESSION['old_login'] : '';?>" id="inputEmail" class="form-control mb-1" placeholder="Enter your Email" required="" autofocus="" autocomplete="on">

          <!-- <label for="inputPassword" class="visually-hidden">Password</label> -->
          <input type="password" name="password" id="inputPassword" class="form-control mt-1" placeholder="Enter your password" required="" autocomplete="on">

          <input type="hidden" name="token" value="<?php if(isset($_SESSION['token'])){echo $_SESSION['token'];}else{echo '';}; ?>">

          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
      </main>
  </div>
</section>
<!-- <script src="js/cursor_pos_login.js"></script> -->
</body>
</html>
