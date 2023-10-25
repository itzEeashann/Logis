<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Legends E-Hailing</title>
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

  <link href="assets/css/main.css" rel="stylesheet">
</head>
<?php 
    include('conn.php'); 
    include('session.php'); 
    if (isset($_SESSION['username'])) {
    $result = mysqli_query($conn, "SELECT * FROM acc WHERE username='".$_SESSION['username']."' ");
    $row = mysqli_fetch_array($result);
    }
    ?>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="home-customer.php" class="logo d-flex align-items-center">
        <h1>Legends E-Hailing</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="home-admin.php" class="active">Home</a></li>
          <li><a class="get-a-quote" href="logout.php">Log Out</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>wELCOME ADMIN!</h2>
              <p>You're Able to Check Account Details!</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="home-customer.php">Home</a></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->
    <!-- ======= Get a Quote Section ======= -->
    <section id="get-a-quote" class="get-a-quote">
      <div class="container" data-aos="fade-up">
        <div class="row g-0">
        <style>
            /* CSS for table */
            table {
            width: 100%;
            border-collapse: collapse;
            }

            th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            }

            th {
            background-color: #f2f2f2;
            }
        </style>
        <body>
        <?php
            include_once('conn.php');
            $query=
            "SELECT * FROM acc ";
            $result= mysqli_query($conn, $query);
        ?>  
        <table>
            <thead>
            <tr>
                <th>username</th>
                <th>age</th>
                <th>gender</th>
                <th>email</th>
                <th>role</th>
                <th>password</th>
                <th>delete?</th>
            </tr>
            <?php
                while($row=mysqli_fetch_assoc($result))
                {
            ?>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><a href="deleteacc.php?username=<?php echo $row['username']; ?>">Delete</a></td>
            </tr>
            <?php  
                }
                ?>
            </tbody>
        </table>
        </body>
        </div>

      </div>
    </section><!-- End Get a Quote Section -->
    <!-- ======= Get a Quote Section ======= -->
    <section id="get-a-quote" class="get-a-quote">
      <div class="container" data-aos="fade-up">

        <div class="row g-0">

          <div class="col-lg-5 quote-bg" style="background-image: url(assets/img/quote-bg.jpg);"></div>

          <div class="col-lg-7" class="php-email-form">
            <form action="editacc.php" method="post" class="php-email-form">
              <h3>Edit Profile</h3>
              <p>Edit Profile Here!</p>
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="username" placeholder="Enter Username to change" class="form-control" value="" required>
                </div>

                <div class="col-md-6">
                    <input type="num" name="age" placeholder="Enter age to change" class="form-control" value="" required>
                </div>

                <div class="col-md-6">
                    <input type="num" name="gender" placeholder="Enter gender to change" class="form-control" value="" required>
                </div>

                <div class="col-md-6">
                <input type="email" name="email" placeholder="Enter email to change" class="form-control" value="" required>
                </div>

                <div class="col-md-6">
                  <input type="text" name="role" placeholder="Enter role to change" class="form-control" value="" required>
                </div>

                <div class="col-md-6">
                    <input type="text" name="password" placeholder="Enter password to change" class="form-control" value="" required>
                </div>
                <button type="submit" name="submit" id="submit">Edit!</button>
              </div>
            </form>
          </div><!-- End Quote Form -->

        </div>

      </div>
    </section><!-- End Get a Quote Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Legends E-Hailing</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/Legends E-Hailing-bootstrap-Legends E-Hailingtics-website-template/ -->
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