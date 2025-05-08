<?php


?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BATU Library</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/book-preview.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
    rel="stylesheet">

</head>
<!-- navigation bar start -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top p-1">
  <div class="container">
    <!-- logo -->
    <a class="navbar-brand fs-4 " href="index.html"><img src="images/logo.png" alt="Logo" width="48" height="48"
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
          <li class="nav-item d-flex align-items-center d-block d-lg-none mb-3">
            <a href="profile.html"><img src="wishlist-images/profile.png" alt="User" class="rounded-circle ms-3"
                width="40" height="40"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="contact.html">Contact</a><!--to do-->
          </li>
          <li class="nav-item dropdown mx-2">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu mt-3">
              <!-- COMMENT: I think the hover text color has low contrast  -->
              <li><a class="dropdown-item" href="Explore.html">Explore</a></li>

              <li>
                <a class="dropdown-item" href="Events.html">Events</a><!--to do-->
              </li>
              <li>
                <a class="dropdown-item" href="wishlist.html">Wishlist</a>
              </li>
              <li>
                <a class="dropdown-item" href="borrowed.html">Borrowed</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- login/signup -->
        <div class="d-flex justify-content-center align-items-center ">
          <a href="login.html" id="login" class="text-white fw-semibold text-decoration-none px-3 py-1 rounded-4">Log
            In</a>
          <a href="register1.html" id="register" class="btn primary-color main-btn">Register</a>
        </div>
        <!-- profile -->
        <div class="d-flex align-items-center mt-1 d-none d-lg-block">
          <a href="profile.html"><img src="wishlist-images/profile.png" alt="User" class="rounded-circle ms-3"
              width="40" height="40"></a><!--to do-->
        </div>
      </div>
    </div>
  </div>
</nav>
<div style="height: 66px;"></div>
<!-- navigation bar end -->
<main>
  <section class="container-fluid main-container">
    <section class='container px-0 book-container min-vh-80 flex-lg-row flex-md-column d-flex align-items-center justify-content-start'>
      <div class='book-image-container'>
        <img src='wishlist-images/book1.jpg' class='book-image'>
      </div>
      <section class='book-details d-flex justify-content-start align-items-center ps-5'>
        <div class='book-divider vertical'>
          <div></div>
        </div>
        <section class="book-text  d-flex flex-column justify-content-start ps-5">
          <h3 class='book-title'>Book Title</h3>
          <span class='book-author'>Author: Name</span>
          <h4 class='book-desc-heading'>Description:</h4>
          <p class='book-desc'>Start of Description</p>

        </section>
      </section>
      <section class='px-4 card'>
        <main class="card-body">
          <header class='card-title'>
            Deadline Rules
          </header>
          <p>
            Reserve Period
            <br>
            <span class='ps-2 item'>
              - 24 Hours
            </span>
          </p>
          <p>
            Borrow Period
            <br>
            <span class='ps-2 item'>
              - 3 Days
            </span>
          </p>
        </main>
        <footer class='d-flex justify-content-center align-items-center mt-3 pb-3 px-3 footer'>
          <button class='px-4 py-1'>Reserve</button>
        </footer>
      </section>
    </section>
    <div class='divider'>
      <div></div>
    </div>
  </section>
</main>
