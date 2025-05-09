<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Styled Button</title>
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Quicksand:wght@300..700&display=swap"
    rel="stylesheet">

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
            <li class="nav-item d-flex align-items-center d-block d-lg-none mb-3">
              <a href="profile.php"><img src="wishlist-images/profile.png" alt="User" class="rounded-circle ms-3 "
                  width="40" height="40"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link active" href="contact.php">Contact</a><!--to do-->
            </li>
            <li class="nav-item dropdown mx-2">
              <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="f
                alse">
                Services
              </a>
              <ul class="dropdown-menu mt-3">
                <!-- COMMENT: I think the hover text color has low contrast  -->
                <li><a class="dropdown-item" href="Explore.php">Explore</a></li>

                <li>
                  <a class="dropdown-item" href="Events.php">Events</a><!--to do-->
                </li>
                <li>
                  <a class="dropdown-item" href="wishlist.php">Wishlist</a>
                </li>
                <li>
                  <a class="dropdown-item " href="borrowed.php">Borrowed</a>
                </li>
              </ul>
            </li>
          </ul>
          <!-- login/signup -->
          <div class="d-flex justify-content-center align-items-center ">
            <a href="login.php" id="login" class="text-white fw-semibold text-decoration-none px-3 py-1 rounded-4">Log
              In</a>
             <!-- removed the register  //omar -->
          </div>
          <!-- profile -->
          <div class="d-flex align-items-center mt-1 d-none d-lg-block">
            <a href="profile.php"><img src="wishlist-images/profile.png" alt="User" class="rounded-circle ms-3"
                width="40" height="40"></a><!--to do-->
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- navigation bar end -->
  <div class="main d-flex align-items-center" style="min-height: calc(100vh - 390px)">

    <div class="container  my-5 pt-5">
      <header class="header ">
        <h1 class=" about-title border-0 text-center px-0 py-3 py-lg-3 ms-md-4 mb-3 pt-md-5"><i
            class="fa-solid fa-phone-volume pe-3 "></i>Contact Us</h1>
      </header>
      <div class="row">
        <div class="col-lg-8 align-items-center text-start">
          <!-- displaying the icons -->
          <div class="icons-container h-100 d-flex flex-column justify-content-center ">
            <div class="icon-label m-3">
              <i class="fas fa-home "></i>
              Borg El Arab Technological University
            </div>
            <div class="icon-label m-3">
              <i class="fas fa-envelope"></i>
              example@batechu.com
            </div>
            <div class="icon-label m-3">
              <i class="fas fa-phone"></i>
              +201234567890
            </div>
            <div class="icon-label icon-contact text-center text-md-start   px-md-5 my-5">
              <a href="#" class=" me-3 fs-1 px-2 py-md-1 d-inline-block mx-md-4"><i
                  class="fa-brands facebook fa-square-facebook"></i></a>
              <a href="#" class=" me-3 fs-1 px-2 py-md-1 d-inline-block mx-md-4"><i
                  class="fa-brands youtube fa-youtube"></i></a>
              <a href="#" class=" me-3 fs-1 px-2 py-md-1 d-inline-block mx-md-4"><i
                  class="fa-brands linkedin fa-linkedin"></i></a>
              <a href="#" class=" me-3 fs-1 px-2 py-md-1 d-inline-block mx-md-4"><i
                  class="fa-brands instagram fa-instagram"></i></a>

            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="container"></div>
          <div class="form-container m-auto">
            <h4>send message</h4>
            <form action="" method="get">
              <div class="mb-3">

                <input type="text" class="form-control rounded-pill" id="username" placeholder="FullName">
              </div>
              <div class="mb-3">
                <input type="email" class="form-control rounded-pill" id="email" placeholder="example@gmail.com">
              </div>
              <div class="mb-3">
                <textarea class="form-control rounded-3" id="comment" rows="9"
                  placeholder="type your Message"></textarea>
              </div>
              <button type="submit" class="btn-submit btn main-btn rounded-pill">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
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
            <li><a href="index.php#fqa" class="foorer-link text-decoration-none text-light">FAQs</a></li>
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
          <p class="mb-0">&copy; 2024 <span class="fw-bold" style="color: aquamarine;">BATU Library</span> . All rights
            reserved.</p>
        </div>
      </div>
    </div>
  </footer>


  <script src="js/all.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/index.js"></script>
</body>

</html>
