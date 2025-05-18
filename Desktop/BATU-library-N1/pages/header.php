<?php
if ($_SERVER['REQUEST_URI'] === '/pages/header.php') {
  header('HTTP/1.0 404 Page Not Found');
  die();
}

use controller\Student;
use controller\Admin;

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_COOKIE["user"])) {
  $_SESSION["user"] = $_COOKIE["user"];
}
if (isset($_SESSION["user"]) && !isset($user)) {
  try {
    require_once(__DIR__ . "/../controller/Student.php");
    /**@var Student $user */
    $user = unserialize($_SESSION["user"]);
  } catch (Exception $error) {
    require_once(__DIR__ . "/../controller/Admin.php");
    /**@var Admin $user */
    $user = unserialize($_SESSION["user"]);
  }

  $role = $user->role;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BATU Library</title>
  <link rel="stylesheet" href="/pages/css/bootstrap.min.css">
  <link rel="stylesheet" href="/pages/css/all.min.css">
  <link rel="stylesheet" href="/pages/css/profile.css">
  <link rel="stylesheet" href="/pages/css/Events.css">
  <link rel="stylesheet" href="/pages/css/borrowed-style.css">
  <link rel="stylesheet" href="/pages/css/contact.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
    rel="stylesheet">

</head>

<body>
  <!-- navigation bar start -->
  <nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top p-1">
    <div class="container">
      <!-- logo -->
      <a class="navbar-brand fs-4 " href="index.php"><img src="/pages/images/logo.png" alt="Logo" width="48" height="48"
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
                  <a href="profile.php"><img src="<?= ($user->student_image) ? $user->student_image : "/pages/images/profile.png" ?>" alt="User" class="rounded-circle ms-3"
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
                if (isset($role) && $role == "student") {
                ?>
                  <li>
                    <a class="dropdown-item" href="wishlist.php" id="wishlist">Wishlist</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="borrowed.php" id="borrowed">Borrowed</a>
                  </li>
                <?php
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
              <a href="/pages/login.php" id="log-in" class="btn primary-color main-btn">Log In</a>
            </div>
            <!-- removed the register  //omar -->
            <!-- profile -->
          <?php
          }
          if (isset($_SESSION["user"])) {
            $role = $user->role; ?>
            <div class="d-flex align-items-center mt-1 d-none d-lg-block">

              <?php
              if ($role == "student") {
              ?>
                <a href="profile.php"><img src="<?= ($user->student_image) ? $user->student_image : "/pages/images/profile.png" ?>" alt="User" class="rounded-circle ms-3"
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
