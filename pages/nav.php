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
                <li>
                  <a class="dropdown-item" href="wishlist.php" id="wishlist">Wishlist</a>
                </li>
                <li>
                  <a class="dropdown-item" href="borrowed.php" id="borrowed">Borrowed</a>
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