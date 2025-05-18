<?php require_once(__DIR__ . "/header.php") ?>
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
          <input type="email" id="email" name="email" class="form-control rounded-pill py-2" />
        </p>
        <p id="email-error" style="color:red;"></p>
        <div>
          <label class="field-label" for="password">Password</label>
          <div class="input-container">
            <input type="password" id="password" name="password" class="form-control rounded-pill py-2 " />
            <span class="togglePassword" id="togglePassword"
              onclick="toggleIcon(this.previousElementSibling,this.children[0],this.children[1])">
              <i class="fa-solid fa-eye-slash" id="icon1" style="cursor: pointer; display: inline-block"></i>
              <i class="fa-solid fa-eye" id="icon2" style="cursor: pointer;display: none;"></i>
            </span>
            <p id="pass-error" style="color:red;"></p>
          </div>
        </div>
        <div class="form-check form-check-inline">
          <input
            class="form-check-input"
            type="checkbox"
            id="remember"
            name="remember"
            value="1" />
          <label class="form-check-label" for="remember">Remember Me</label>
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
<script src="js/handle-login.js"></script>
</body>

</html>
