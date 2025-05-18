
   <?php require_once(__DIR__."/header.php")?>

  <!-- navigation bar end -->
  <!-- wishlist header start-->
  <div class="container mt-5 pt-5">
    <div class="wishlist-header page-header d-flex flex-column justify-content-center align-items-center mt-3">
      <i class="fa-solid fa-heart"></i>
      <h1 class="mt-3">MY WISHLIST</h1>
    </div>

    <!-- Search Bar -->
    <div class="search-bar mb-4 text-center">
      <div class="input-group mt-3 w-75 w-lg-50 mx-auto">
        <input type="text" class="form-control custom-input rounded-pill py-2" placeholder=" Search Wishlist"
          aria-label="Search Wishlist">
      </div>
    </div>

    <!-- Filter and Sort Options -->
    <div class="filter-sort-row text-center mt-3">
      <div class="d-flex mx-auto gap-2  w-75">
        <button class="btn btn-secondary rounded-pill" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#filterOffcanvas" aria-controls="filterOffcanvas">
          <i class="fa-solid fa-filter" style="color: #08546d;"></i> Filter
        </button>
        <div class="dropdown">
          <button class="btn btn-secondary rounded-pill dropdown-toggle" type="button" id="sort-dropdown"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-right-left fa-rotate-90" style="color: #08546d;"></i> Sort By
          </button>
          <!-- Sort -->
         <ul class="dropdown-menu sort" id="dropdown-menu-sort" aria-labelledby="sort-dropdown">
            <li><a class="dropdown-item dropdown-item-sort" href="#" data-value="1">Date Added</a></li>
            <li><a class="dropdown-item dropdown-item-sort" href="#" data-value="2">Title</a></li>
            <li><a class="dropdown-item dropdown-item-sort" href="#" data-value="3">Author</a></li>
            <li><a class="dropdown-item dropdown-item-sort" href="#" data-value="4">Popularity</a></li>
            <li><a class="dropdown-item dropdown-item-sort" href="#" data-value="5">Release Date</a></li>
            <li><a class="dropdown-item dropdown-item-sort" href="#" data-value="6">Random</a></li>
          </ul>
        </div>
      </div>
      <!-- Filter -->
      <div class="offcanvas offcanvas-bottom h-50" tabindex="-1" id="filterOffcanvas">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title primary-color fw-bolder d-flex align-items-center">
            Filter Books
            <i class="fas fa-search ms-3" data-bs-toggle="collapse" href="#searchBar"></i>
          </h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="collapse mx-3" id="searchBar">
          <input type="search" class="form-control custom-input rounded-pill" placeholder="Search">
        </div>
        <div class="offcanvas-body">
          <div class="row gx-2 gy-3">
            <!-- language -->
            <div class="col-md-6 col-lg-3 mb-2">
              <label class="form-label primary-color fw-bold">Language:</label>
              <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-secondary rounded-pill px-3" data-filter="language" data-value="All">All</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="language"
                  data-value="English">English</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="language"
                  data-value="Spanish">Arabic</button>
              </div>
            </div>
            <!-- availability -->
            <div class="col-md-6 col-lg-3 mb-2">
              <label class="form-label primary-color fw-bold">Availability:</label>
              <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-secondary rounded-pill px-3" data-filter="availability"
                  data-value="All">All</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="availability"
                  data-value="Available">Available</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="availability"
                  data-value="Borrowed">Borrowed</button>
              </div>
            </div>
            <!-- genre -->
            <div class="col-md-6 col-lg-3 mb-2">
              <label class="form-label primary-color fw-bold">Genre:</label>
              <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-secondary rounded-pill px-3" data-filter="genre" data-value="all">All</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="genre"
                  data-value="engineering">Enineering</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="genre" data-value="cs">Computer
                  Science</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="genre" data-value="ai">Artificial
                  intelligence</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="genre" data-value="data">Data Science
                  and analytics</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="genre" data-value="dev">Web and App
                  Development</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="genre"
                  data-value="net">Networking</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="genre" data-value="security">Cyber
                  Security</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="genre"
                  data-value="math">Mathmatics</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="genre"
                  data-value="self-selp">Self-Help</button>
              </div>
            </div>
            <!-- category -->
            <div class="col-md-6 col-lg-3 mb-2">
              <label class="form-label primary-color fw-bold">Category:</label>
              <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-secondary rounded-pill px-3" data-filter="category" data-value="all">All</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="category" data-value="text-books">Text
                  Books</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="category"
                  data-value="most-borrowed">Most Borrowed</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="category"
                  data-value="refrence-books">Refrence Books</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="category"
                  data-value="recommended-students">Recommended by Students</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="category"
                  data-value="recommended-faculty">Recommended by Faculty</button>
                <button class="btn btn-secondary rounded-pill px-3" data-filter="category"
                  data-value="academic-research">Academic Reasearch</button>
              </div>
            </div>
          </div>
          <!-- buttons -->
          <div class="mt-5 text-center">
            <button class="btn btn-primary rounded-pill">Apply Filters</button>
            <button class="btn btn-secondary rounded-pill">Reset Filters</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- wishlist header end-->

  <!-- books section start -->
  <div class="container mt-5">
    <div class="row justify-content-center" id='wishlist'>
      <div class="row">
        <div class="col">
          <h5 class="mb-1 ms-1 ms-sm-3 ms-md-4 ms-lg-1 ms-xl-2 fw-bold primary-color">Results Found: </h5>
        </div>
      </div>
      <!-- books  -->
    </div>
  </div>
  <!-- book section end -->

  <!-- pagination start-->
  <nav aria-label="Page navigation" class="d-flex justify-content-center">
    <ul class="pagination mb-0 flex-wrap">
      <li class="page-item">
        <a class="page-link" href="#">
          <i class="fa-solid fa-angles-left" id="page-nav-icons" style="color: #08546d;"></i>
        </a>
      </li>
      <li class="page-item d-none d-sm-inline mx-1"></li>
      <li class="page-item">
        <a class="page-link" href="#">
          <i class="fa-solid fa-angle-left" id="page-nav-icons" style="color: #08546d;"></i>
        </a>
      </li>
      <li class="page-item d-none d-sm-inline mx-1"></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item d-none d-sm-inline mx-1"></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item d-none d-sm-inline mx-1"></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item d-none d-sm-inline mx-1"></li>
      <li class="page-item">
        <a class="page-link" href="#">
          <i class="fa-solid fa-angle-left fa-flip-horizontal" id="page-nav-icons" style="color: #08546d;"></i>
        </a>
      </li>
      <li class="page-item d-none d-sm-inline mx-1"></li>
      <li class="page-item">
        <a class="page-link" href="#">
          <i class="fa-solid fa-angles-left fa-flip-horizontal" id="page-nav-icons" style="color: #08546d;"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- pagination end-->

  <!-- scroll up start-->
  <a href="#" class="scroll-top">
    <i class="fa-solid fa-circle-chevron-up" style="color: #08546d; font-size: 40px;"></i>
  </a>
  <!-- scroll up end-->

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
        <h5 class="text-uppercase"style="font-family: 'Poppins'; font-size: 22px; font-weight: 600;">About Us</h5>
        <p>
          The BATU Library is dedicated to providing resources and spaces for learning, collaboration, and growth. Join us in building a community of knowledge.
        </p>
      </div>
      </div>
      <!-- Quick Links -->
      <div class="col-md-4 mb-4">
        
        <h5 class="text-uppercase"style="font-family: 'Poppins'; font-size: 22px; font-weight: 600;">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.php" class="  foorer-link text-decoration-none text-light">Home</a></li>
          <li><a href="Explore.php" class="foorer-link text-decoration-none text-light">Categories</a></li>
          <li><a href="wishlist.php" class="foorer-link text-decoration-none text-light">Wishlist</a></li>
          <li><a href="#fqa" class="foorer-link text-decoration-none text-light">FAQs</a></li>
          <li><a href="about.php" class="foorer-link text-decoration-none text-light">About Us</a></li>
        </ul>
      </div>
      <!-- Contact Section -->
      <div class="col-md-4 mb-4">
        <h5 class=" text-uppercase "style="font-family: 'Poppins'; font-size: 22px; font-weight: 600;">Contact Us</h5>
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
          <p class="mb-0">&copy; 2024 <span class="fw-bold" style="color: aquamarine;">BATU Library</span> . All rights reserved.</p>
        </div>
      </div>
    </div>
</footer>

  <!-- JS -->
  <script>
    let el=document.getElementById('wishlist');
    let el2=document.getElementById('services');
    el.classList.add('active');
    el2.classList.add('active');
  </script>
  <script src="js/index.js"></script>
  <script src="wishlist-script.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>

</body>

</html>
