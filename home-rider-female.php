<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Legends</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
   <!-- ======= Header ======= -->
   <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="home-rider-female.php" class="logo d-flex align-items-center">
        <h1>Legends E-Hailing</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="home-rider-female.php" class="active">Home</a></li>
          <li><a class="get-a-quote" href="logout.php">Log Out</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <?php 
      include('conn.php'); 
      include('session.php'); 
      if (isset($_SESSION['username'])) {
        $result = mysqli_query($conn,"select * from acc where username='".$_SESSION['username']."'");
            $row = mysqli_fetch_array($result);
      }
    ?>
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Welcome Rider <b><?php echo $_SESSION['username'];?></b></h2>
              <p>You can see your upcoming ride here!</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="home-ride-male.html">Home</a></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <!-- ======= Horizontal Pricing Section ======= -->
    <?php
      include_once('conn.php');
      $query = "SELECT * FROM booking WHERE status='pending'";
      $result = mysqli_query($conn, $query);
    ?>
    <div class="section-header">
      <span>Pending Ride</span>
      <h2>Pending Ride</h2>
    </div>
    <?php
      while($row=mysqli_fetch_assoc($result))
      {
    ?>
    <section id="horizontal-pricing" class="horizontal-pricing pt-0">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4 pricing-item featured mt-4" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h3><?php echo $row['username'];?></h3>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h4><sup>RM</sup><?php echo $row['price'];?><span> / ride</span></h4>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <ul>
              <li><i class="bi bi-check"></i>Departure: &nbsp;<strong><?php echo $row['departure'];?></strong></li>
              <li><i class="bi bi-check"></i>Destination: &nbsp;<strong><?php echo $row['destination'];?></strong></li>
              <li><i class="bi bi-check"></i>Phone: &nbsp;<strong><?php echo $row['phone'];?></strong></li>
              <li><i class="bi bi-check"></i>Message: &nbsp;<strong><?php echo $row['message'];?></strong></li>
            </ul>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
          <form action="accept-female.php" <?php echo $row['id']; ?> method="POST">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <input type="hidden" name="ridername" value="<?php echo $_SESSION['username'];?>">
              <input class="buy-btn" type="submit" name="ongoing" value="Pickup?">
          </form>
        </div><!-- End Pricing Item -->
      </div>
      <?php  
        }
        ?>
    <?php
      include_once('conn.php');
      $query = "SELECT * FROM booking WHERE status='ongoing' AND ridername = '{$_SESSION['username']}'";
      $result = mysqli_query($conn, $query);
    ?>
    <br>
    <br>
    <div class="section-header">
      <span>Ongoing Ride</span>
      <h2>Ongoing Ride</h2>
    </div>
    <?php
      while($row=mysqli_fetch_assoc($result))
      {
    ?>
    <section id="horizontal-pricing" class="horizontal-pricing pt-0">
      <div class="container" data-aos="fade-up">
      <div class="row gy-4 pricing-item mt-4" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h3><?php echo $row['username'];?></h3>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h4><sup>$</sup><?php echo $row['price'];?><span> / ride</span></h4>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <ul>
            <li><i class="bi bi-check"></i>Departure: &nbsp;<strong><?php echo $row['departure'];?></strong></li>
              <li><i class="bi bi-check"></i>Destination: &nbsp;<strong><?php echo $row['destination'];?></strong></li>
              <li><i class="bi bi-check"></i>Phone: &nbsp;<strong><?php echo $row['phone'];?></strong></li>
              <li><i class="bi bi-check"></i>Message: &nbsp;<strong><?php echo $row['message'];?></strong></li>
            </ul>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <form action="finish-female.php" <?php echo $row['id']; ?> method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input class="buy-btn" type="submit" name="finish" value="Finish?">
            </form>
          </div>
        </div><!-- End Pricing Item -->
      </div>
      <?php  
        }
        ?>
      <?php
      include_once('conn.php');
      $query = "SELECT * FROM booking WHERE status='finish'AND ridername = '{$_SESSION['username']}'";
      $result = mysqli_query($conn, $query);
    ?>
    <div class="section-header">
      <span>Finished Ride</span>
      <h2>Finished Ride</h2>
    </div>
    <?php
      while($row=mysqli_fetch_assoc($result))
      {
    ?>
    <section id="horizontal-pricing" class="horizontal-pricing pt-0">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4 pricing-item featured mt-4" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h3><?php echo $row['username'];?></h3>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h4><sup>$</sup><?php echo $row['price'];?><span> / ride</span></h4>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <ul>
              <li><i class="bi bi-check"></i>Departure: &nbsp;<strong><?php echo $row['departure'];?></strong></li>
              <li><i class="bi bi-check"></i>Destination: &nbsp;<strong><?php echo $row['destination'];?></strong></li>
              <li><i class="bi bi-check"></i>Phone: &nbsp;<strong><?php echo $row['phone'];?></strong></li>
              <li><i class="bi bi-check"></i>Message: &nbsp;<strong><?php echo $row['message'];?></strong></li>
            </ul>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <div class="text-center"><a href="delete-female.php?id=<?php echo $row["id"]; ?>" class="buy-btn">Delete?</a></div>
        </div><!-- End Pricing Item -->
      </div>
      <?php  
        }
        ?>
    </section><!-- End Horizontal Pricing Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Legends E-Hailing</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">Legends E-Hailing Team</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>