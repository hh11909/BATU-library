<?php require_once(__DIR__ . "/header.php") ?>
<?php

use controller\Student;

if (!isset($_SESSION["user"])) {
  header("Location:login.php");
} else {
  require_once(__DIR__ . "/../controller/Student.php");
  /**@var Student $user */
  $user = unserialize($_SESSION["user"]);
  $role = $user->role;
  if ($role == "admin") {
    header("Location:index.php");
  }
}
?>
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
            <li class="py-4 active px-2 "><a href="profile.php"><i
                  class="fa-solid fa-user pe-4 pt-lg-0 "></i>Profile</a></li>
            <li class="py-4  px-2"><a href="privacy.php"><i class="fa-solid fa-shield-halved pe-4"></i>Privacy</a>
            </li>
            <li class="py-4  ps-2 pe-1"><a href="user-info.php"><i class="fa-solid fa-circle-info pe-3"></i>User
                information</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-7 p-0 p-md-0 m-0  z-0 ">
      <div class="profile-content ">

        <div class=" position-relative ">
          <input type="file" id="bannerInput" name="bannerImage" class="d-none" accept="image/*">
          <div class="profile-big-picture d-block container-fluid p-0">
            <?php
            if ($user->student_image) {
            ?>
              <img src="<?= $user->student_image ?>" alt="" class="profileImageDisplay" id="BigImageDisplay" style="width:100%;height:100%;object-fit: cover;">
            <?php
            }
            ?>
          </div>
          <a type="button" class="btn btn-main rounded-5 btn-add-img btn-profile-big-picture position-absolute z-1 "
            onclick="document.getElementById('bannerInput').click();">
            <i class="fas fa-camera fs-3"></i>
          </a>
        </div>
        <div class="profile-card d-flex flex-column justify-content-center align-items-center position-relative">
          <div class=" position-relative user-profile-picture ">
            <div class="profile-picture-holder">
              <input type="file" id="profileInput" name="profileImage" class="d-none" accept="image/*">
              <img src="<?= ($user->profile_image) ? $user->profile_image : 'images/profile.png' ?>" alt="" class="profile-picture" id="profileImageDisplay">
            </div>
            <a type="button" class="btn btn-main rounded-5 btn-add-img btn-profile-picture position-absolute "
              onclick="document.getElementById('profileInput').click();">
              <i class="fas fa-camera fs-3"></i>
            </a>

          </div>
          <h3 class="user text-center"><?= $user->name ?></h3>
          <h4 class="user-department text-center"><?= ($user->readDepartment($user->department_ID)["department"]) ?></h4>
          <!-- <h3 class="user text-center">

              <div class="d-flex text-center">
                <input type="text" name="bio" id="bio" placeholder="Enter your bio" class="bio text-center" readonly>
                <button class="primary-color p-0 border-0" style="background-color: #f6fbf2;" onclick="toggleEdit()"><i
                    class=" fa-solid fa-pen"></i></button>
              </div>
            </h3> -->

        </div>
      </div>


      <div class="profile-borrowed-section ">
        <h3 class="p-4">Borrowed Books</h3>
        <div class="row p-2 m-0">

          <!-- book1 -->

          <div class="col-md-4 col-sm-6 col-6 mb-4" key="1001">
            <div class="card h-100 border-0"><img src="wishlist-images/book1.jpg"
                class="card-img-top img-fluid mx-auto d-block border border-light" alt="Bool Cover"
                style="max-width: 150px; margin: 20px auto;">
              <div class="d-flex pe-2"><button class="btn btn-link ms-auto"><svg class="svg-inline--fa fa-heart"
                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-heart"></i> Font Awesome fontawesome.com --></button><button
                  class="btn btn-link ms-2"><svg class="svg-inline--fa fa-bookmark" aria-hidden="true"
                    focusable="false" data-prefix="fas" data-icon="bookmark" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-bookmark"></i> Font Awesome fontawesome.com --></button></div>
              <div class="car-body p-2">
                <h5 class="card-title">Python Programming for Biology</h5>
                <p class="card-text" key="3000">Tim J. Stevens</p>
              </div>
            </div>
          </div>
          <!-- book2 -->
          <div class="col-md-4 col-sm-6 col-6 mb-4" key="1001">
            <div class="card h-100 border-0"><img src="wishlist-images/book1.jpg"
                class="card-img-top img-fluid mx-auto d-block border border-light" alt="Bool Cover"
                style="max-width: 150px; margin: 20px auto;">
              <div class="d-flex pe-2"><button class="btn btn-link ms-auto"><svg class="svg-inline--fa fa-heart"
                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-heart"></i> Font Awesome fontawesome.com --></button><button
                  class="btn btn-link ms-2"><svg class="svg-inline--fa fa-bookmark" aria-hidden="true"
                    focusable="false" data-prefix="fas" data-icon="bookmark" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-bookmark"></i> Font Awesome fontawesome.com --></button></div>
              <div class="car-body p-2">
                <h5 class="card-title">Python Programming for Biology</h5>
                <p class="card-text" key="3000">Tim J. Stevens</p>
              </div>
            </div>
          </div>


          <!-- book3 -->

          <div class="col-md-4 col-sm-6 col-6 mb-4" key="1001">
            <div class="card h-100 border-0"><img src="wishlist-images/book1.jpg"
                class="card-img-top img-fluid mx-auto d-block border border-light" alt="Bool Cover"
                style="max-width: 150px; margin: 20px auto;">
              <div class="d-flex pe-2"><button class="btn btn-link ms-auto"><svg class="svg-inline--fa fa-heart"
                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-heart"></i> Font Awesome fontawesome.com --></button><button
                  class="btn btn-link ms-2"><svg class="svg-inline--fa fa-bookmark" aria-hidden="true"
                    focusable="false" data-prefix="fas" data-icon="bookmark" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-bookmark"></i> Font Awesome fontawesome.com --></button></div>
              <div class="car-body p-2">
                <h5 class="card-title">Python Programming for Biology</h5>
                <p class="card-text" key="3000">Tim J. Stevens</p>
              </div>
            </div>
          </div>
        </div>
        <div class="text-end p-4">
          <a href="" class="show-more text-decoration-underline">Show More</a>
        </div>

      </div>




      <div class="book-recommend-section mb-5">
        <h3 class="p-4">Recommended Books</h3>
        <div class="row p-2 m-0">

          <!-- book1 -->

          <div class="col-md-4 col-sm-6 col-6 mb-4" key="1001">
            <div class="card h-100 border-0"><img src="wishlist-images/book1.jpg"
                class="card-img-top img-fluid mx-auto d-block border border-light" alt="Bool Cover"
                style="max-width: 150px; margin: 20px auto;">
              <div class="d-flex pe-2"><button class="btn btn-link ms-auto"><svg class="svg-inline--fa fa-heart"
                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-heart"></i> Font Awesome fontawesome.com --></button><button
                  class="btn btn-link ms-2"><svg class="svg-inline--fa fa-bookmark" aria-hidden="true"
                    focusable="false" data-prefix="fas" data-icon="bookmark" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-bookmark"></i> Font Awesome fontawesome.com --></button></div>
              <div class="car-body p-2">
                <h5 class="card-title">Python Programming for Biology</h5>
                <p class="card-text" key="3000">Tim J. Stevens</p>
              </div>
            </div>
          </div>
          <!-- book2 -->
          <div class="col-md-4 col-sm-6 col-6 mb-4" key="1001">
            <div class="card h-100 border-0"><img src="wishlist-images/book1.jpg"
                class="card-img-top img-fluid mx-auto d-block border border-light" alt="Bool Cover"
                style="max-width: 150px; margin: 20px auto;">
              <div class="d-flex pe-2"><button class="btn btn-link ms-auto"><svg class="svg-inline--fa fa-heart"
                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-heart"></i> Font Awesome fontawesome.com --></button><button
                  class="btn btn-link ms-2"><svg class="svg-inline--fa fa-bookmark" aria-hidden="true"
                    focusable="false" data-prefix="fas" data-icon="bookmark" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-bookmark"></i> Font Awesome fontawesome.com --></button></div>
              <div class="car-body p-2">
                <h5 class="card-title">Python Programming for Biology</h5>
                <p class="card-text" key="3000">Tim J. Stevens</p>
              </div>
            </div>
          </div>


          <!-- book3 -->

          <div class="col-md-4 col-sm-6 col-6 mb-4" key="1001">
            <div class="card h-100 border-0"><img src="wishlist-images/book1.jpg"
                class="card-img-top img-fluid mx-auto d-block border border-light" alt="Bool Cover"
                style="max-width: 150px; margin: 20px auto;">
              <div class="d-flex pe-2"><button class="btn btn-link ms-auto"><svg class="svg-inline--fa fa-heart"
                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-heart"></i> Font Awesome fontawesome.com --></button><button
                  class="btn btn-link ms-2"><svg class="svg-inline--fa fa-bookmark" aria-hidden="true"
                    focusable="false" data-prefix="fas" data-icon="bookmark" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                    <path fill="currentColor"
                      d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z">
                    </path>
                  </svg><!-- <i class="fa-solid fa-bookmark"></i> Font Awesome fontawesome.com --></button></div>
              <div class="car-body p-2">
                <h5 class="card-title">Python Programming for Biology</h5>
                <p class="card-text" key="3000">Tim J. Stevens</p>
              </div>
            </div>
          </div>
        </div>
        <div class="text-end p-4">
          <a href="Explore.php" class="show-more text-decoration-underline">
            <h6>Show More</h6>
          </a>
        </div>

      </div>

    </div>


    <!--Starting groups sidebar-->
    <div class="col-lg-3 p-0">
      <div class="groups-info z-0 m-0 text-center h-100">


        <div>
          <!--Starting reading groups section-->
          <div class="container read-groups d-flex flex-column justify-content-center gap-3 read-groups p-0 pb-5">
            <div class="read-group-title ">
              <h3 class="pt-5 me-3">Reading Groups</h3>
            </div>
            <div class="group d-flex justify-content-right gap-2 align-items-center m-2 ms-5" id="group1">
              <div class="group-image ms-1">
              </div>
              <h6 class="fs-5 ">group 1</h6>
            </div>
            <div class="group d-flex justify-content-right gap-2 align-items-center m-2 ms-5" id="group2">
              <div class="group-image ms-1">
              </div>
              <h6 class="fs-5 ">group 2</h6>
            </div>
            <div class="group d-flex justify-content-right gap-2 align-items-center m-2 ms-5" id="group3">
              <div class="group-image ms-1">
              </div>
              <h6 class="fs-5 ">group 3</h6>
            </div>
          </div>

          <div
            class="container recommend-read-groups my-3 d-flex flex-column justify-content-center gap-3 read-groups p-0 pb-5">
            <div class="read-group-title ">
              <h3 class="pt-4 w-75 text-md-start ms-2 ps-5">Recommended Reading Groups</h3>
            </div>
            <div class="group d-flex justify-content-right gap-2 align-items-center m-2 ms-5" id="group1">
              <div class="group-image ms-1">
              </div>
              <h6 class="fs-5 ">group 1</h6>
              <a href="" class="btn join-btn rounded-pill fw-bold fs-6 px-3 py-1 mt-5">join</a>

            </div>
            <div class="group d-flex justify-content-right gap-2 align-items-center m-2 ms-5" id="group2">
              <div class="group-image ms-1">
              </div>
              <h6 class="fs-5 ">group 2</h6>
              <a href="" class="btn join-btn rounded-pill fw-bold fs-6 px-3 py-1 mt-5">join</a>
            </div>
            <div class="group d-flex justify-content-right gap-2 align-items-center m-2 ms-5" id="group3">
              <div class="group-image ms-1">
              </div>
              <h6 class="fs-5 ">group 3</h6>
              <a href="" class="btn join-btn rounded-pill fw-bold fs-6 px-3 py-1 mt-5">join</a>
            </div>
          </div>




        </div>
      </div>
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
</footer>
<script>
  // function toggleEdit() {
  //   var input = document.getElementById("bio");
  //   input.readOnly = !input.readOnly;
  //   input.focus();
  // }
</script>
<script src="js/profilePics.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/index.js"></script>
<script src="js/all.min.js"></script>
</body>

</html>
