<?php

use controller\Student;
use controller\Admin;
use controller\Friend;

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_COOKIE["user"])) {
  $_SESSION["user"] = $_COOKIE["user"];
}
if (isset($_SESSION["user"]) && !isset($user) && isset($_SESSION["role"])) {

  if ($_SESSION["role"] == "student") {
    require_once(__DIR__ . "/../controller/Student.php");
    /**@var Student $user */
    $user = unserialize($_SESSION["user"]);
  } elseif ($_SESSION["role"] == "friend") {
    require_once(__DIR__ . "/../controller/Friend.php");
    /**@var Friend $user */
    $user = unserialize($_SESSION["user"]);
  } elseif ($_SESSION["role"] == "admin") {
    require_once(__DIR__ . "/../controller/Admin.php");
    header("Location:admin/admin-users.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BATU Library</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Quicksand:wght@300..700&display=swap"
    rel="stylesheet">
  <style>
    .main .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top p-1">
    <div class="container">
      <!-- logo -->
      <a class="navbar-brand fs-4 " href="index.php"><img src="images/logo.png" alt="Logo" width="48" height="48"
          class="me-2 p-1 logo">
        <span class="logo-title">
          BATU Library
        </span></a>
      <!-- toggle button -->
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- sidebar -->
      <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <!-- sidebar header -->
        <div class="offcanvas-header text-white border-bottom">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Discover</h5>
          <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <!-- sidebar body -->
        <div class="offcanvas-body d-flex flex-column flex-lg-row p-lg-0 p-4">
          <ul class="navbar-nav justify-content-lg-end align-items-center fs-6 flex-grow-1 pe-3">
            <?php
            if (isset($_SESSION["user"])) {
              $role = $user->role;
              if ($role == "student") {
            ?>
                <li class="nav-item d-flex align-items-center d-block d-lg-none mb-3">
                  <a href="profile.php"><img src="<?= ($user->student_image) ? $user->student_image : "images/profile.png" ?>" alt="User" class="rounded-circle ms-3"
                      width="40" height="40"></a><!--to do-->
                </li>
            <?php
              }
            }
            ?>
            <li class="nav-item">
              <a class="nav-link mx-2" id="home" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="about.php" id="about">About</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="contact.php" id="contact">Contact</a><!--to do-->
            </li>
            <li class="nav-item dropdown mx-2">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false" id="services">
                Services
              </a>
              <ul class="dropdown-menu mt-3">
                <!-- COMMENT: I think the hover text color has low contrast  -->
                <li><a class="dropdown-item" href="Explore.php" id="explore">Explore</a></li>

                <li>
                  <a class="dropdown-item" href="Events.php" id="events">Events</a><!--to do-->
                </li>
                <?php
                if (isset($user) && isset($_SESSION["role"])) {
                  if ($user->role == "student") {
                ?>
                    <li>
                      <a class="dropdown-item" href="wishlist.php" id="wishlist">Wishlist</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="borrowed.php" id="borrowed">Borrowed</a>
                    </li>
                <?php
                  }
                }

                ?>
              </ul>
            </li>
          </ul>
          <!-- login/signup -->
          <?php
          if (!isset($_SESSION["user"])) {
          ?>
            <div class="d-flex justify-content-center align-items-center">
              <a href="login.php" id="log-in" class="btn primary-color main-btn">Log In</a>
            </div>
            <!-- removed the register  //omar -->

            <!-- profile -->
          <?php
          }
          if (isset($user->role)) {
          ?>
            <div class="d-flex align-items-center mt-1 d-none d-lg-block">
              <?php
              if ($user->role == "student") {
              ?>
                <a href="profile.php"><img src="<?= ($user->profile_image) ? $user->profile_image : "images/profile.png" ?>" alt="User" class="profileImageDisplay rounded-circle ms-3"
                    width="40" height="40"></a><!--to do-->
              <?php } ?>

            </div>
            <div class="d-flex justify-content-center align-items-center">
              <a href="../api/user/logout.php" id="log-out" class="btn primary-color main-btn ms-lg-5">Log Out</a>
            </div>
            <!-- removed the register  //omar -->
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </nav>
  <div style="height: 66px;background-color: #08546d;"></div>
  <!-- navigation bar end -->
  <div class="main">

    <section class="hero-section text-white pt-5 " style="background-color: #08546d;">
      <div class="container-fluid hero-grid  d-flex align-items-center flex-column flex-md-row pe-0">
        <div class="col-md-7 ">
          <div class="container">

            <div class=" mb-5">
              <h1 style="font-family: 'Poppins'; font-size: 54px; font-weight: 600; max-width: 510px; ">The University
                Library at BATU</h1>
            </div>
            <div class=" mb-5">
              <p style="font-family: 'Quicksand'; font-size: 20px; max-width: 507px; color: #eff7ed;">BATU Library is a
                comprehensive university library that serves the diverse academic and research needs of the campus
                community</p>
            </div>
            <div class="mb-5"><a href="Explore.php" class="btn main-btn px-4 py-3 btn-home">Explore now</a></div>
          </div>

        </div>
        <div>
          <img src="images/Home.png" alt="Library Image" class="img-fluid">
        </div>
      </div>
    </section>
    <!-- Discover Section -->
    <section class="discover-section py-5" style="background-color: #ffffff;">
      <div class="container"> <!--a container to adjust the photo place :)  -->
        <div class="container discover-grid d-flex align-items-center flex-column flex-md-row m-0 p-0 ">
          <div class="col-md-5  me-5">
            <img src="images/home2.jpg" alt="Library Image" style="width: auto; height: auto;" class="img-fluid">
          </div>
          <div class="col-md-7 ">
            <div class="h2 mb-5">
              <h2 style="font-family: 'Poppins'; font-size: 58px; font-weight: 600; color: #08546d; max-width: 565px;">
                Discover the BATU Library</h2>
            </div>
            <div class="p2 mb-5">
              <p style="font-family: 'Quicksand'; font-size: 16px; font-weight: 500; color: #08546d; max-width: 560px;">
                The BATU Library is a vibrant hub of intellectual activity, offering a wide range of resources and
                services to support the university's academic mission. From extensive print and electronic collections
                to state-of-the-art study spaces and collaborative areas, the library empowers students, faculty, and
                researchers to engage in deep learning, innovative research, and meaningful discovery</p>
            </div>
            <div class="list mb-5">
              <ul class="list-unstyled p-0" style=" max-width: 130px;">
                <li class="my-3"><a class="nav-link "
                    style="font-family: 'Poppins'; font-size: 19px; font-weight: 500; color: #08546d;"
                    href="Explore.php"><i class="fa-solid fa-book"></i> Collections</a></li>
                <li class="mb-5 "><a class="nav-link "
                    style="font-family: 'Poppins'; font-size: 19px; font-weight: 500; color: #08546d;"
                    href="wishlist.php"><i class="fa-regular fa-heart"></i> Whishlist</a></li>
              </ul>
            </div>
            <div class="button2 my-5">
              <a href="Explore.php" class="btn main-btn px-4 py-3 btn-home">Explore now</a>
            </div>
          </div>
        </div>
      </div>


    </section>

    <!-- FAQs Section -->
    <section class="faqs-section py-5" id="fqa"> <!-- location ==> index.php#fqa -->
      <div class="container-fluid ">
        <h2 class="text-center mb-4" style="font-family: 'Poppins'; font-size: 53px; font-weight: 600; color: #08546d;">
          FAQs</h2>
        <p class="text-center mb-5"
          style="font-family: 'Quicksand'; font-size: 21px; font-weight: 500; color: #08546d;">Find answers to your most
          common questions about the BATU Library.</p>
        <div class="row g-4">
          <div class="col-md-8 ">
            <div class="container">
              <div class="row g-4 ">

                <div class="col-md-6">
                  <div class="card faq-card " style=" width:auto ;height: 133px;">
                    <h5>Hours and Directions</h5>
                    <p>Learn about our schedule and how to visit us.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card faq-card" style=" width: auto ;height: 133px;">
                    <h5>Membership</h5>
                    <p>Find out how to become a library member.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card faq-card" style=" width: auto ;height: 133px;">
                    <h5>Online Catalog</h5>
                    <p>Access our digital collection anytime, anywhere.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card faq-card" style=" width: auto ;height: 133px;">
                    <h5>Library Events</h5>
                    <p>Stay up to date on our upcoming events, workshops, and programs</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="container ms-md-4">

              <div class="card faqq-card ">
                <div class="row ">
                  <div class="col-lg-5">
                    <h5 class="me-20 fw-bold text-start">Giving to the Library</h5>
                    <p class="text-start mb-5 pb-5">Support the BATU Library's mission through charitable contributions
                    </p>

                  </div>
                  <div class="col-lg-7 d-flex flex-column justify-content-end ">
                    <a href="#" class="btn main-btn px-4 py-3 btn-home btn-donate">Donate now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <section class="info-cards-section py-5">
      <div class="container">
        <div class="row g-4 ">
          <div class="col-md-4">
            <div class="card card info-card">
              <h5>Connect with Us</h5>
              <p>Reach out to us on social media or via email.</p>
              <a href="contact.php" class="btn main-btn fw-bold">Contact</a>
            </div>
          </div>
          <div class=" col-md-4">
            <div class="card info-card">
              <h5>Get Involved</h5>
              <p>Participate in events or volunteer at the library.</p>
              <a href="Events.php" class="btn main-btn fw-bold">Learn More</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card info-card">
              <h5>Support the Library</h5>
              <p>Recover how to help sustain the library's growth.</p>
              <a href="#" class="btn main-btn fw-bold">Donate</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Footer -->
  <footer class="footer py-5 text-center text-md-start" style="background-color: #08546d; color: #f6fbf2;">
    <div class="container-fluid footer-grid">
      <div class="row">
        <!-- About Section -->
        <div class="col-md-4 mb-4">
          <div class="container">
            <div class=" mb-5 mt-0 align-items-center" href="#">
              <img src="images/logo.png" alt="Logo" width="48" height="48" class="me-2 p-1 logo">
              <span class="logo-title">
                BATU Library
              </span>
            </div>
            <h5 class="text-uppercase" style="font-family: 'Poppins'; font-size: 22px; font-weight: 600;">About Us</h5>
            <p>
              The BATU Library is dedicated to providing resources and spaces for learning, collaboration, and growth.
              Join us in building a community of knowledge.
            </p>
          </div>
        </div>
        <!-- Quick Links -->
        <div class="col-md-4 mb-4">

          <h5 class="text-uppercase" style="font-family: 'Poppins'; font-size: 22px; font-weight: 600;">Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="index.php" class="  foorer-link text-decoration-none text-light">Home</a></li>
            <li><a href="Explore.php" class="foorer-link text-decoration-none text-light">Categories</a></li>
            <li><a href="wishlist.php" class="foorer-link text-decoration-none text-light">Wishlist</a></li>
            <li><a href="#fqa" class="foorer-link text-decoration-none text-light">FAQs</a></li>
            <li><a href="about.php" class="foorer-link text-decoration-none text-light">About Us</a></li>
          </ul>
        </div>
        <!-- Contact Section -->
        <div class="col-md-4 mb-4">
          <h5 class=" text-uppercase " style="font-family: 'Poppins'; font-size: 22px; font-weight: 600;">Contact Us
          </h5>
          <p>
            <strong>Email:</strong> @batulibrary.com<br>
            <strong>Phone:</strong> +1 234 567 8900<br>
            <strong>Address:</strong> BATU
          </p>
          <div class="social-icons">
            <a href="#" class="text-light me-3 fs-4 p-2"><i class="fa-brands facebook fa-square-facebook"></i></a>
            <a href="#" class="text-light me-3 fs-4 p-2"><i class="fa-brands youtube fa-square-youtube"></i></a>
            <a href="#" class="text-light me-3 fs-4 p-2"><i class="fa-brands linkedin fa-linkedin"></i></a>
            <a href="#" class="text-light me-3 fs-4 p-2"><i class="fa-brands instagram fa-instagram"></i></a>
          </div>
        </div>
      </div>
      <hr class="border-light">
      <div class="row">

        <div class="col-md-4 text-center">
          <p class="mb-0">&copy; 2024 <span class="fw-bold" style="color: aquamarine;">BATU Library</span> . All
            rights
            reserved.</p>
        </div>
      </div>
    </div>
  </footer>
  <script>
    let el = document.getElementById('home');
    el.classList.add('active');
  </script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/index.js"></script>
</body>

</html>
