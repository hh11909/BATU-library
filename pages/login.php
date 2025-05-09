<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BATU Library</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
    rel="stylesheet">


</head>

<body class="register-body">
  <!-- navigation bar start -->
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
              <a href="profile.php"><img src="wishlist-images/profile.png" alt="User" class="rounded-circle ms-3"
                  width="40" height="40"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="contact.php">Contact</a><!--to do-->
            </li>
            <li class="nav-item dropdown mx-2">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
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
                  <a class="dropdown-item" href="borrowed.php">Borrowed</a>
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
  <div style="height: 66px;"></div>
  <!-- navigation bar end -->

  <div class="container">
    <div class="register-container">
      <div class="register-header">
        <i class="fas fa-user"></i>
        <h2>Log In</h2>
        <h1 class="welcome-text">Welcome To BATU’s Library!</h1>
      </div>
      <div class="container px-md-5">
        <div id="errorAlert" class="alert alert-danger alert-dismissible fade d-none mt-3" role="alert">
          <span id="errorMessage">An error occurred!</span>
          <button type="button" class="btn-close" aria-label="Close" onclick="hideError()"></button>
        </div>

        <div id="successAlert" class="alert alert-success alert-dismissible fade d-none mt-3" role="alert">
          <span id="successMessage">Success</span>
          <button type="button" class="btn-close" aria-label="Close" onclick="hideSuccess()"></button>
        </div>

        <form class="login-form px-md-5" action="../api/user/login.php" method="post" id='loginForm'>
          <p>

            <label class="field-label " for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control rounded-pill py-2" required />
          </p>
          <div>
            <label class="field-label" for="password">Password</label>
            <div class="input-container">
              <input type="password" id="password" name="password" class="form-control rounded-pill py-2 " required />
              <span class="togglePassword" id="togglePassword"
                onclick="toggleIcon(this.previousElementSibling,this.children[0],this.children[1])">
                <i class="fa-solid fa-eye-slash" id="icon1" style="cursor: pointer; display: inline-block"></i>
                <i class="fa-solid fa-eye" id="icon2" style="cursor: pointer;display: none;"></i>
              </span>
            </div>
          </div>
          <a class="forgot-password" href="#">Forgot Password?</a>
          <div class="text-center">

            <button class="btn main-btn fs-5 py-1" type="submit">Log In</button>
          </div>

        </form>
        <!-- removed the register  //omar -->
      </div>
    </div>
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
  <!-- Bootstrap JS and Fontawesome -->
  <script src="js/hide-pass.js">

  </script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
  <!-- js -->
  <script src="js/index.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>
