
<?php require_once(__DIR__."/header.php")?>
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

  <script>
    let el=document.getElementById('contact');
    el.classList.add('active');
  </script>
  <script src="js/all.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/index.js"></script>
</body>

</html>
