<?php include "configs/dbconnect.php" ?>
<?php include "configs/is_admin.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "includes/head.php" ?>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/baguetteBox.min.css">
  <title>Employees</title>
</head>
<body>

  <?php require "includes/header.php" ?>
  <section id="main">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
       <div class="carousel-inner">
         <div class="carousel-item active">
           <img src="img/slider/img_1.jpg" class="d-block w-100 disabled">
         </div>
         <div class="carousel-item">
           <img src="img/slider/img_2.jpg" class="d-block w-100 disabled">
         </div>
         <div class="carousel-item">
           <img src="img/slider/img_3.jpg" class="d-block w-100 disabled">
         </div>
       </div>
     </div>
     <!-- Carousel end -->
     <!--  -->
     <div class="main-text">
       <div class="col-md-12 text-center">
           <h1 class="sliderTextBig text-white greenUnderline fw-bold">
             Welcome to my test project!
           </h1>
           <h3 class="sliderTextSmall text-white mb-3">
             If you want to try all the permissions with administrator rights, register and let me know, I will issue them to you, or use:<br><br>
             <strong>E-Mail: test@gmail.com</strong><br>
             <strong>Password: 12345</strong>
           </h3>
       </div>
    </div>
     <!--  -->
  </section>
   <div class="gallery">
    <!-- Begining -->
        <a href="img/gallery/full/img_1.jpg">
          <img src="img/gallery/thmb/img_1.jpg" alt="First image">
        </a>
    <!-- End -->
    <!-- Begining -->
        <a href="img/gallery/full/img_2.jpg">
          <img src="img/gallery/thmb/img_2.jpg" alt="Second image">
        </a>
    <!-- End -->
    <!-- Begining -->
        <a href="img/gallery/full/img_3.jpg">
          <img src="img/gallery/thmb/img_3.jpg" alt="Third image">
        </a>
    <!-- End -->
    <!-- Begining -->
        <a href="img/gallery/full/img_4.jpg">
          <img src="img/gallery/thmb/img_4.jpg" alt="Third image">
        </a>
    <!-- End -->
    <!-- Begining -->
        <a href="img/gallery/full/img_5.jpg">
          <img src="img/gallery/thmb/img_5.jpg" alt="Third image">
        </a>
    <!-- End -->
  </div>
  <?php require "includes/footer.php" ?>

<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/baguetteBox.min.js"></script>
</body>
</html>
