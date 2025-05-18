<?php require_once(__DIR__ . "/header.php") ?>
<div class="sticky-top" style="height: 66px;"></div>
<!-- navigation bar end -->
<div class="account-content ">
  <div class="row m-0" style="max-width: 100%;">
    <div class="col-lg-2  p-0 z-3">
      <div class="account-info z-0 h-100">

        <button class="btn d-lg-none account-btn " type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
          <i class="fa-solid fa-chevron-down "></i>
        </button>
        <div class="collapse  d-lg-block " id="collapseWidthExample">
          <h3 class="account-title text-center mx-2 mb-0 p-4">Account</h3>

          <ul class="list-unstyled">
            <li class="py-4 px-2 "><a href="profile.php"><i class="fa-solid fa-user pe-4 pt-lg-0 "></i>Profile</a>
            </li>
            <li class="py-4  px-2"><a href="privacy.php"><i class="fa-solid fa-shield-halved pe-4"></i>Privacy</a>
            </li>
            <li class="py-4 active ps-2 pe-1"><a href="user-info.php"><i
                  class="fa-solid fa-circle-info pe-3"></i>User
                information</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-10 p-0 p-md-0 m-0  z-0 ">
      <div class="user-info-content container  p-0 m-0">
        <h2 class="user-info-title text-center mx-2 mx-md-4 p-3 pb-3 py-lg-3 pt-3 mb-3"><i
            class="fa-solid fa-circle-info pe-3 pe-md-4"></i> User Information</h2>

        <div class="container mt-3">
          <h2 class="text-start ">Profile Information</h2>
          <div class="container pt-5">
            <div class="row">
              <div class="col-lg-3 d-flex justify-content-center p-5">
                <div class="image"
                  style="padding: 90px;height: 150px;border-radius: 150px;background-image: url('<?= ($user->profile_image) ? $user->profile_image : "images/profile.png" ?>');background-size:cover;background-repeat: no-repeat;background-position-x: center;">
                  <!-- <img src=""  alt=""> -->
                </div>
              </div>
              <div class="col-lg-5">
                <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Name: </span><span
                    class="profile-value fs-4 fw-semibold" id="first-name"><?= $user->name ?></span></p>
                <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">College:</span><span
                    class="profile-value fs-4 fw-semibold" id="last-name"> to do</span></p>
                <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Department:</span><span
                    class="profile-value fs-4 fw-semibold" id="department"> to do</span></p>
                <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Phone:</span><span
                    class="profile-value fs-4 fw-semibold" id="phone"><?= $user->phone ?></span></p>
                <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Email:</span><span
                    class="profile-value fs-4 fw-semibold" id="email"><?= $user->email ?></span></p>
              </div>
              <div class="col-lg-4">
                <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Academy number:</span><span
                    class="profile-value fs-4 fw-semibold" id="academy-number"> <?= $user->academy_number ?></span></p>
                <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Gender: </span><span
                    class="profile-value fs-4 fw-semibold" id="academy-number"><?= $user->gender ?></span></p>
                <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Library’s Friend: </span><span
                    class="profile-value fs-4 fw-semibold" id="lib-friend"><?= ($user->is_friend) ? "Yes" : "No" ?></span></p>
              </div>
            </div>
            <div class="col-lg-5">
              <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Name: </span><span
                  class="profile-value fs-4 fw-semibold" id="first-name"><?= $user->name ?></span></p>
              <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">College:</span><span
                  class="profile-value fs-4 fw-semibold" id="last-name"> to do</span></p>
              <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Department:</span><span
                  class="profile-value fs-4 fw-semibold" id="department"> to do</span></p>
              <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Phone:</span><span
                  class="profile-value fs-4 fw-semibold" id="phone"><?= $user->phone ?></span></p>
              <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Email:</span><span
                  class="profile-value fs-4 fw-semibold" id="email"><?= $user->email ?></span></p>
            </div>
            <div class="col-lg-4">
              <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Academy number:</span><span
                  class="profile-value fs-4 fw-semibold" id="academy-number"> <?= $user->academy_number ?></span></p>
              <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Gender: </span><span
                  class="profile-value fs-4 fw-semibold" id="academy-number"><?= $user->gender ?></span></p>
              <p class="profile-title py-4"><span class="profile-key fw-semibold fs-4">Library’s Friend: </span><span
                  class="profile-value fs-4 fw-semibold" id="lib-friend"><?= ($user->is_friend) ? "Yes" : "No" ?></span></p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
<footer class="footer py-5 text-center text-md-start d-flex justify-content-end bottom-0"
  style="background-color: #08546d; color: #f6fbf2;">
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
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/index.js"></script>
</body>

</html>
