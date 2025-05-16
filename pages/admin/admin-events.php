<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin SiteName</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/form.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                <li><a class="dropdown-item" href="../admin-requests.php">Requests</a></li>
                <li><a class="dropdown-item" href="../admin-users.php">Users</a></li>
                <li><a class="dropdown-item" href="../admin-books.php">Books</a></li>
                <li><a class="dropdown-item active" href="../admin-borrowed-books.php">Borrowed Books</a></li>
                <li><a class="dropdown-item" href="../admin-events.php">Events</a></li>
                <li><a class="dropdown-item" href="../admin-contact.php">Contact</a></li>
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

<div class="main-content">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h5>Event Management</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
              <i class="fas fa-plus me-2"></i>Add New Event
            </button>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" id="eventsTable">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Event Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Will be populated with data from JavaScript -->
                  <tr>
                    <td colspan="5" class="text-center py-4">Loading data...</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Add/Edit Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="eventForm">
          <input type="hidden" id="eventId">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="eventName" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="eventName" required>
              </div>
              <div class="form-group">
                <label for="eventDate" class="form-label">Event Date</label>
                <input type="datetime-local" class="form-control" id="eventDate" required>
              </div>
              <div class="form-group">
                <label for="joinMethod" class="form-label">Participation Method</label>
                <input type="text" class="form-control" id="joinMethod" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="eventPhoto" class="form-label">Event Photo</label>
                <input type="file" class="form-control" id="eventPhoto" accept="image/*">
                <div class="mt-2">
                  <img id="photoPreview" src="#" alt="Preview" style="max-height: 150px; display: none;">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="eventContent" class="form-label">Event Details</label>
            <textarea class="form-control" id="eventContent" rows="5" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveEventBtn">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this event?</p>
        <input type="hidden" id="eventToDelete">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
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
              <img src="images/logo.png" alt="Logo" width="48" height="48" class="me-2 p-1 logo">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Image preview handling
    document.getElementById('eventPhoto').addEventListener('change', function(e) {
      const preview = document.getElementById('photoPreview');
      if (e.target.files.length > 0) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(e.target.files[0]);
      }
    });
  
    // Event management
    document.addEventListener('DOMContentLoaded', function() {
      const eventsTable = document.getElementById('eventsTable');
      const eventForm = document.getElementById('eventForm');
      const saveEventBtn = document.getElementById('saveEventBtn');
      const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
      const addEventModal = new bootstrap.Modal(document.getElementById('addEventModal'));
      const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
  
      // Load events on page load
      loadEvents();
  
      // Save event
      saveEventBtn.addEventListener('click', function() {
        // Add AJAX save logic here
        alert('Saving event...');
        addEventModal.hide();
      });
  
      // Confirm deletion
      confirmDeleteBtn.addEventListener('click', function() {
        const eventId = document.getElementById('eventToDelete').value;
        // Add AJAX delete logic here
        alert('Deleting event with ID: ' + eventId);
        confirmDeleteModal.hide();
        loadEvents();
      });
  
      // Load events function
      function loadEvents() {
        // Example dummy data (replace with AJAX call)
        const events = [
          {
            id: 1,
            name: "Annual Book Fair",
            date: "2024-06-15T10:00",
            image: "images/event1.jpg",
            status: "Upcoming"
          },
          {
            id: 2,
            name: "Modern Literature Symposium",
            date: "2024-05-20T14:00",
            image: "images/event2.jpg",
            status: "Completed"
          }
        ];
  
        renderEvents(events);
      }
  
      // Render events in table
      function renderEvents(events) {
        const tbody = eventsTable.querySelector('tbody');
        tbody.innerHTML = '';
  
        if (events.length === 0) {
          tbody.innerHTML = '<tr><td colspan="5" class="text-center py-4">No events available</td></tr>';
          return;
        }
  
        events.forEach(event => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="${event.image}" class="avatar avatar-sm me-3" alt="${event.name}">
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">${event.name}</p>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">${new Date(event.date).toLocaleString()}</p>
            </td>
            <td>
              <span class="badge ${event.status === 'Upcoming' ? 'bg-success' : 'bg-secondary'}">
                ${event.status}
              </span>
            </td>
            <td class="align-middle">
              <button class="btn btn-sm btn-info me-2 edit-btn" data-id="${event.id}">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-danger delete-btn" data-id="${event.id}">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          `;
          tbody.appendChild(row);
        });
  
        // Add event listeners to buttons
        document.querySelectorAll('.edit-btn').forEach(btn => {
          btn.addEventListener('click', function() {
            editEvent(this.getAttribute('data-id'));
          });
        });
  
        document.querySelectorAll('.delete-btn').forEach(btn => {
          btn.addEventListener('click', function() {
            document.getElementById('eventToDelete').value = this.getAttribute('data-id');
            confirmDeleteModal.show();
          });
        });
      }
  
      // Edit event function
      function editEvent(eventId) {
        // Example dummy data (replace with AJAX call)
        const event = {
          id: eventId,
          name: "Annual Book Fair",
          date: "2024-06-15T10:00",
          content: "Event details here...",
          joinMethod: "Online registration",
          image: "images/event1.jpg"
        };
  
        document.getElementById('eventId').value = event.id;
        document.getElementById('eventName').value = event.name;
        document.getElementById('eventDate').value = event.date.replace(' ', 'T');
        document.getElementById('eventContent').value = event.content;
        document.getElementById('joinMethod').value = event.joinMethod;
        
        const preview = document.getElementById('photoPreview');
        preview.src = event.image;
        preview.style.display = 'block';
  
        document.getElementById('addEventModalLabel').textContent = 'Edit Event';
        addEventModal.show();
      }
    });
  </script>
</body>
</html>