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
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Quicksand:wght@300..700&display=swap"
    rel="stylesheet">
  <style>

  </style>
</head>


<body>
  <!-- navigation bar start -->
  <?php require_once('nav.php')?>
  <div style="height: 66px;"></div>
  <!-- navigation bar end -->

  <header class="header">
    <div class="container pt-4 my-4">
      <h1 class=" about-title border-0 text-center px-0 pb-md-3 py-lg-3 ms-md-4 mb-3 pt-5"><i
          class="fa-solid fa-circle-info pe-4"></i>About Us</h1>
      <p class="subtitle text-center">The BATU Library is dedicated to supporting the university's academic and research
        priorities</p>
    </div>
  </header>

  <main class="about-section p-0 m-0 d-lg-flex align-items-center" style="min-height: calc(100vh - 630px)">
    <div class="card-container">
      <!-- Card 1 -->
      <div class="photo-card mx-3">
        <img src="images/liberarian.jpg" alt="Our Librarians" class="card-image">
        <div class="card-content">
          <h2>Our Librarians and Supporters</h2>
          <p>Get to know the passionate individuals who work behind the scenes to make your library experience better.
          </p>
          <a href="#" class="card-link"><i class="fa-regular fa-address-card"></i> Get to Know Us</a>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="photo-card mx-3">
        <img src="images/together.jpg" alt="Community and Friends" class="card-image">
        <div class="card-content">
          <h2>Together for Knowledge</h2>
          <p>Library friends who support and contribute to our vibrant library community.</p>
          <a href="#" class="card-link"><i class="fa-solid fa-users"></i> Community and Friends</a>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="photo-card mx-3">
        <img src="images/service.jpg" alt="Explore Services" class="card-image">
        <div class="card-content">
          <h2>Explore Our Services</h2>
          <p>Explore the range of services our library provides, from book borrowing to study spaces.</p>
          <a href="#" class=" card-link"><i class="fa-solid fa-cloud fa-cloud"></i> Explore Our Services</a>
        </div>
      </div>
    </div>
  </main>
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

  <script>
    let el=document.getElementById('about');
    el.classList.add('active');
  </script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/index.js"></script>

</body>

</html>
