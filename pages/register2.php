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
      <div id="errorAlert" class="alert alert-danger alert-dismissible fade d-none mt-3" role="alert">
        <span id="errorMessage">An error occurred!</span>
        <button type="button" class="btn-close" aria-label="Close" onclick="hideError()"></button>
      </div>
      <div id="successAlert" class="alert alert-success alert-dismissible fade d-none mt-3" role="alert">
        <span id="successMessage">Success</span>
        <button type="button" class="btn-close" aria-label="Close" onclick="hideSuccess()"></button>
      </div>
      <form id='registerUserInfo'>
        <div class="row mb-3">
          <div class="col-md-4 d-flex justify-content-start align-items-center">
            <div class=" position-relative">
              <input type="file" id="profileImage" name="profileImage" class="d-none" accept="image/*"
                onchange="previewImage()">
              <img
                src="data:image/png;base64,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"
                alt="Profile Image" class="profile-image" id="profileImageDisplay">
              <a type="button" class="btn btn-main rounded-5 px-2 py-1 btn-add-img position-absolute bottom-0 end-0"
                onclick="document.getElementById('profileImage').click();">
                <i class="fas fa-camera"></i>
              </a>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group mb-3">
              <label for="department" class="form-label">Department</label>
              <input type="text" class="form-control rounded-pill" id="department" name="department"
                placeholder="Enter your department">
            </div>
            <div class="form-group mb-3">
              <label for="phoneNumber" class="form-label">Phone Number</label>
              <input type="tel" class="form-control rounded-pill" id="phoneNumber" name="phoneNumber"
                placeholder="Enter your phone number">
            </div>
          </div>
        </div>

        <!-- توسيط الزر في المنتصف -->
        <div class="d-flex justify-content-center mt-4">
          <button type="submit" class="btn primary-color main-btn d-block m-auto text-center">Finish</button>
        </div>
      </form>

      <!-- Welcome text -->
      <p class="welcome-text">Welcome to <span style="color: #28a745;"> BATU University Library</span></p>
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
  <!-- Bootstrap JS -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/index.js"></script>
  <!-- Image preview JS -->
  <script>
    function previewImage() {
      const file = document.getElementById('profileImage').files[0];
      const reader = new FileReader();
      reader.onloadend = function () {
        document.getElementById('profileImageDisplay').src = reader.result;
      };
      if (file) {
        reader.readAsDataURL(file);
      }
    }
  </script>
</body>

</html>
