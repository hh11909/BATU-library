<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Contact Messages</title>

  <!-- External Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 <link rel="stylesheet" href="../css/admin-contact.css">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="/pages/css/admin-style.css">
  <link rel="stylesheet" href="/pages/css/admin-contact.css">
  <link rel="stylesheet" href="../css/admin-contact.css">
  
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
      <li>
        <a href="admin-users.php"><i class="fas fa-users"></i> <span>Users</span></a>
      </li>
      <li>
        <a href="admin-books.php"><i class="fas fa-book"></i> <span>Books</span></a>
      </li>
      <li>
        <a href="admin-borrowed-books.php"><i class="fas fa-book-reader"></i> <span>Borrowed Books</span></a>
      </li>
      <li class="active">
        <a href="admin-events.php"><i class="fas fa-calendar-alt"></i> <span>Events</span></a>
      </li>
      <li>
        <a href="admin-contact.php"><i class="fas fa-envelope"></i> <span>Contact</span></a>
      </li>
    </ul>
  </div>

  
  <!-- Main Content -->
  <div class="main-content">
    <div class="container content-container my-5 pt-4">
      <header class="primary-color text-center fw-bold mt-1 mb-2">
        <h2> <i class="fas fa-envelope-open-text me-2 title-icon"> </i>
          Contact Messages
      </h2>
      </header>

      <main>
        <!-- Filter Section -->
        <div class="controls-card card mb-4">
          <div class="card-body">
             <header class="primary-color fw-bold mt-1 mb-2">
            <h5 class="card-title-form"><i class="fas fa-filter me-1"></i>Filter Messages</h5>
            
            <div class="search-bar row g-3 align-items-center mt-2">
              <div class="col-md-auto">
                <label for="search-input" class="form-label mb-0"><i class="fas fa-search me-1"></i>Search:</label>
              </div>
              <div class="col-md">
                <input type="text" id="search-input" name="search-input" class="form-control form-control-sm" placeholder="Enter search term...">
              </div>
              <div class="col-md-auto">
                <label for="search-date" class="form-label mb-0"><i class="fas fa-calendar-alt me-1"></i>Date:</label>
              </div>
              <div class="col-md">
                <input type="text" id="search-date" name="search-date" class="form-control form-control-sm" placeholder="dd/mm/yyyy" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
              </div>
              <div class="col-md-auto">
                <button type="button" id="search-button" class="btn btn-sm btn-search-action"><i class="fas fa-search me-1"></i>Filter</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Messages Table -->
        <div class="messages-card card">
          <div class="card-body">
            <header class="primary-color fw-bold mt-1 mb-2">
            <h5 class="card-title-form mb-3"><i class="fas fa-inbox me-1"></i>Received Messages</h5>
            <div id="loading-indicator" class="text-center my-3" style="display: none;">
              <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
            <div id="no-messages-alert" class="alert alert-info" style="display: none;">No messages found.</div>
            <div class="table-responsive">
              <table class="table table-hover align-middle messages-table">
                <thead>
                  <tr>
                    <th><i class="fas fa-hashtag me-1"></i>ID</th>
                    <th><i class="fas fa-user me-1"></i>Sender</th>
                    <th><i class="fas fa-at me-1"></i>Email</th>
                    <th><i class="fas fa-comment-dots me-1"></i>Snippet</th>
                    <th class="text-center"><i class="fas fa-cogs me-1"></i>Actions</th>
                  </tr>
                </thead>
                <tbody id="messages-table-body">
                  <!-- Dynamic from JavaScript Rows -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="viewMessageModal" tabindex="-1" aria-labelledby="viewMessageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewMessageModalLabel">Message Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><strong>From:</strong> <span id="modal-sender-name"></span></p>
          <p><strong>Email:</strong> <span id="modal-sender-email"></span></p>
          <p><strong>Student ID:</strong> <span id="modal-student-id">N/A</span></p>
          <hr>
          <p><strong>Message:</strong></p>
          <div id="modal-message-content" style="white-space: pre-wrap; word-wrap: break-word;"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            <li><a href="../index.php" class="foorer-link text-decoration-none text-light">Home</a></li>
            <li><a href="Explore.php" class="foorer-link text-decoration-none text-light">Categories</a></li>
            <li><a href="wishlist.php" class="foorer-link text-decoration-none text-light">Wishlist</a></li>
            <li><a href="../index.php#fqa" class="foorer-link text-decoration-none text-light">FAQs</a></li>
            <li><a href="../" class="foorer-link text-decoration-none text-light">About Us</a></li>
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
