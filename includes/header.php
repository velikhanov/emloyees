<header class="header fixed-top" id="header">
      <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
        <a class="navbar-brand">
          <img class="logo" src="img/e.png" alt="Logo">
        </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav  text-center">
              <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '/index.php') ? 'active' : NULL ?>" href="/">Main</a>
              <?php if(!empty($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1 || $_SESSION['is_admin'] === 2){ ?>
                <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/admin_edit.php?id='.$_GET['id'] || $_SERVER['REQUEST_URI'] === '/admin_users_list.php') ? 'active' : NULL ?>" href="admin_users_list.php">Admin panel</a>
              <?php }; ?>
              <?php if(!empty($_SESSION['user'])){ ?>
                <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/personal_area.php' || $_SERVER['REQUEST_URI'] === '/user_edit.php') ? 'active' : NULL ?>" href="personal_area.php">Personal area</a>
                <a id="logout_btn" class="nav-link" href="#">Logout</a>
                <form id="logout_form" action="configs/logout.php" method="post">
                  <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                </form>
              <?php }; ?>
              <?php if(empty($_SESSION['user'])){ ?>
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/signup.php' ? 'active' : NULL ?>" href="signup.php">Register</a>
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/signin.php' ? 'active' : NULL ?>" href="signin.php">Login</a>
              <?php }; ?>
            </div>
          </div>
        </div>
    </nav>
</header>
