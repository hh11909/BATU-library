<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/admin-style.css" />
</head>

<body>
  <!--  Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top p-1">
    <div class="container">
      <!-- logo -->
      <a class="navbar-brand fs-4" href="../index.php">
        <img src="../images/logo.png" alt="Logo" width="48" height="48" class="me-2 p-1 logo">
        <span class="logo-title">BATU Library</span>
      </a>
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
            <li class="nav-item">
              <a class="nav-link mx-2" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="../about.php">About</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="../contact.php">Contact</a>
            </li>
            <li class="nav-item dropdown mx-2">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Services
              </a>
              <ul class="dropdown-menu mt-3">
                <li><a class="dropdown-item" href="../Explore.php">Explore</a></li>
                <li><a class="dropdown-item" href="../Events.php">Events</a></li>
                <li><a class="dropdown-item" href="../wishlist.php">Wishlist</a></li>
                <li><a class="dropdown-item" href="../borrowed.php">Borrowed</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown mx-2" id="admin-dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
              </a>
              <ul class="dropdown-menu mt-3" id="admin-dropdown-menu">
                <li><a class="dropdown-item" href="admin-requests.php">Requests</a></li>
                <li><a class="dropdown-item active" href="admin-users.php">Users</a></li>
                <li><a class="dropdown-item" href="admin-books.php">Books</a></li>
                <li><a class="dropdown-item" href="admin-borrowed-books.php">Borrowed Books</a></li>
                <li><a class="dropdown-item" href="admin-events.php">Events</a></li>
                <li><a class="dropdown-item" href="admin-contact.php">Contact</a></li>
              </ul>
            </li>
          </ul>
          <!-- log Out -->
          <div class="d-flex justify-content-center align-items-center">
            <a href="#" id="log-out" class="btn primary-color main-btn">Log Out</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Admin Sidebar -->
  <div class="sidebar" id="admin-sidebar">
    <div class="sidebar-header" id="admin-sidebar-header">
      <h3><i class="fas fa-book-open me-2"></i> Library Admin</h3>
    </div>
    <ul class="sidebar-menu" id="admin-sidebar-menu">
      <li>
        <a href="admin-requests.php"><i class="fa-solid fa-bell"></i> <span>Requests</span></a>
      </li>
      <li class="active">
        <a href="admin-users.php"><i class="fas fa-users"></i> <span>Users</span></a>
      </li>
      <li>
        <a href="admin-books.php"><i class="fas fa-book"></i> <span>Books</span></a>
      </li>
      <li>
        <a href="admin-borrowed-books.php"><i class="fas fa-book-reader"></i> <span>Borrowed Books</span></a>
      </li>
      <li>
        <a href="admin-events.php"><i class="fas fa-calendar-alt"></i> <span>Events</span></a>
      </li>
      <li>
        <a href="admin-contact.php"><i class="fas fa-envelope"></i> <span>Contact</span></a>
      </li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- Page Header -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="primary-color fw-bold mt-1 mb-2"><i class="fas fa-book-reader me-2"></i> Users </h2>
        <div class="d-flex">
          <div class="input-group me-3 mt-2" style="width: 300px;">
            <input type="text" id="search-students" class="form-control pe-5" placeholder="Search students">
            <select id="select-read" class="form-select bg-primary-color text-light" type="button" style="width: auto; max-width: 100px; appearance: none;">
              <option value="1">all</option>
              <option value="2">id</option>
              <option value="3">name</option>
              <option value="4">phone</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Stats Cards -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-6">
          <div class="stat-card">
            <i class="fa-solid fa-user-tie"></i>
            <h3>5</h3>
            <p>Total sdmins</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-6">
          <div class="stat-card">
            <i class="fa-solid fa-user"></i>
            <h3>1550</h3>
            <p>Total users</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-6">
          <div class="stat-card">
            <i class="fa-solid fa-user-group"></i>
            <h3>578</h3>
            <p>Total Freinds</p>
          </div>
        </div>
      </div>

      <!-- users Table -->
      <div class="card mt-4">
        <div class="card-header bg-primary-color text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="fas fa-list me-2"></i> Users table </h5>
          <div class="dropdown" id="borrowed-dropdown">
            <button class="btn btn-sm btn-light dropdown-toggle  primary-color" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              Filter
            </button>
            <ul class="dropdown-menu dropdown-menu-end" id="borrowed-dropdown-menu" aria-labelledby="filterDropdown">
              <li><a class="dropdown-item" href="#">ID</a></li>
              <li><a class="dropdown-item" href="#">Name</a></li>
              <li><a class="dropdown-item" href="#">Phone</a></li>
            </ul>
          </div>

        </div>
        <div class="card-body px-md-1">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Phone</th>
                  <th>Friend</th>
                  <th class="text-center">Department</th>
                  <th class="text-center">Academec year</th>
                  <th>Delet user</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>2320100</td>
                  <td>Omar Mostafa</td>
                  <td>2320100@gmail.com</td>
                  <td>0123456789</td>
                  <td>Yes</td>
                  <td class="text-center">IT</td>
                  <td class="text-center">2nd</td>
                  <td>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></i></button>
                  </td>
                </tr>

                <tr>
                  <td>2320101</td>
                  <td>Ahmed Mohamed</td>
                  <td>2320101@gmail.com</td>
                  <td>0123456789</td>
                  <td>Yes</td>
                  <td class="text-center">IT</td>
                  <td class="text-center">3rd</td>
                  <td>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2320102</td>
                  <td>Alaa Mohamed</td>
                  <td>2320102@gmail.com</td>
                  <td>0123456789</td>
                  <td>No</td>
                  <td class="text-center">IT</td>
                  <td class="text-center">4th</td>
                  <td>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2320103</td>
                  <td>kareem Ahmed</td>
                  <td>2320103@gmail.com</td>
                  <td>0123456789</td>
                  <td>Yes</td>
                  <td class="text-center">IT</td>
                  <td class="text-center">4th</td>
                  <td>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2320104</td>
                  <td>Assem Mohamed</td>
                  <td>2320104@gmail.com</td>
                  <td>0123456789</td>
                  <td>No</td>
                  <td class="text-center">IT</td>
                  <td class="text-center">2nd</td>
                  <td>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2320106</td>
                  <td>Mohamed Ahmed</td>
                  <td>2320106@gmail.com </td>
                  <td>0123456789</td>
                  <td>No</td>
                  <td class="text-center">IT</td>
                  <td class="text-center">3rd</td>
                  <td>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2320107</td>
                  <td>Hesham Mohamed</td>
                  <td>2320107@gmail.com</td>
                  <td>0123456789</td>
                  <td>No</td>
                  <td class="text-center">IT</td>
                  <td class="text-center">3rd</td>
                  <td>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2320108</td>
                  <td>Ibrahem Ahmed</td>
                  <td>2320108@gmail.com</td>
                  <td>0123456789</td>
                  <td>No</td>
                  <td class="text-center">IT</td>
                  <td class="text-center">1st</td>
                  <td>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2320109</td>
                  <td>Hameed Mohamed</td>
                  <td>2320109@gmail.com</td>
                  <td>0123456789</td>
                  <td>No</td>
                  <td class="text-center">IT</td>
                  <td class="text-center">2nd</td>
                  <td>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2320110</td>
                  <td>Ali Mohamed</td>
                  <td>2320110@gmail.com</td>
                  <td>0123456789</td>
                  <td>Yes</td>
                  <td class="text-center">IT</td>
                  <td class="text-center">1st</td>
                  <td>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer py-5 text-center text-md-start">
    <div class="container-fluid">
      <div class="row">
        <!-- About Section -->
        <div class="col-md-4 mb-4">
          <div class="container">
            <div class="mb-5 mt-0 align-items-center" href="#">
              <img src="../images/logo.png" alt="Logo" width="48" height="48" class="me-2 p-1 logo">
              <span class="logo-title">BATU Library</span>
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
            <li><a href="index.php" class="foorer-link text-decoration-none text-light">Home</a></li>
            <li><a href="Explore.php" class="foorer-link text-decoration-none text-light">Categories</a></li>
            <li><a href="wishlist.php" class="foorer-link text-decoration-none text-light">Wishlist</a></li>
            <li><a href="index.php#fqa" class="foorer-link text-decoration-none text-light">FAQs</a></li>
            <li><a href="about.php" class="foorer-link text-decoration-none text-light">About Us</a></li>
          </ul>
        </div>
        <!-- Contact Section -->
        <div class="col-md-4 mb-4">
          <h5 class="text-uppercase" style="font-family: 'Poppins'; font-size: 22px; font-weight: 600;">Contact Us</h5>
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
        <div class="col-md-12 text-center">
          <p class="mb-0">&copy; 2024 <span class="fw-bold" style="color: aquamarine;">BATU Library </span>. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="../js/handle-user.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
