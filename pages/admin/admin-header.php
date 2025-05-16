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
            <a href="../../api/user/logout.php" id="log-out" class="btn primary-color main-btn">Log Out</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
