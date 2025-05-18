<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Contact Messages</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/pages/css/admin-style.css">
  <link rel="stylesheet" href="/pages/css/admin-contact.css">
  <script src='/pages/js/admin-contact.js'></script>
</head>

<body>
  <?php require_once("admin-header.php"); ?>
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
      <li>
        <a href="admin-events.php"><i class="fas fa-calendar-alt"></i> <span>Events</span></a>
      </li>
      <li class="active">
        <a href="admin-contact.php"><i class="fas fa-envelope"></i> <span>Contact</span></a>
      </li>
    </ul>
  </div>

  <div class="main-content">
    <div class="container content-container my-5 pt-4">
      <header class="page-title-header text-center mb-4">
        <h1><i class="fas fa-envelope-open-text me-2 title-icon"></i>Contact Messages</h1>
      </header>

      <main>
        <div class="controls-card card mb-4">
          <div class="card-body">
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

        <div class="messages-card card">
          <div class="card-body">
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
                  <!-- Message rows will be populated by JavaScript -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- View Message Modal -->
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

  <footer class="admin-footer mt-auto">
    <div class="container-fluid">
      <div class="row justify-content-around">
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 footer-col">
          <div class="d-flex align-items-center mb-2 footer-logo-group">
            <img src="/pages/images/logo.png" alt="Logo" width="35" height="35" class="me-2 admin-logo">
            <span class="footer-brand-text">BATU Library Admin</span>
          </div>
          <p class="footer-col-text">Admin panel for managing BATU Library resources and communications.</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 footer-col">
          <h5 class="footer-col-title">ADMIN LINKS</h5>
          <ul class="list-unstyled footer-links-list">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Manage Messages</a></li>
            <li><a href="#">User Management</a></li>
            <li><a href="#">Site Settings</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 footer-col">
          <h5 class="footer-col-title">SUPPORT</h5>
          <p class="footer-col-text">
            <strong>Email:</strong> admin@batulibrary.com<br>
            <strong>Phone:</strong> +1 234 567 8901
          </p>
        </div>
      </div>
      <hr class="footer-divider">
      <div class="text-center footer-copyright-text">
        <p>&copy; 2025 BATU Library. All rights reserved. Admin Panel.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
