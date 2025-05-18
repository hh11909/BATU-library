<?php require_once("admin-header.php");?>

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
    <li class="active">
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
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="primary-color fw-bold mt-1 mb-2"><i class="fas fa-book me-2"></i> Books</h2>
    </div>
    <!-- Stats Cards -->
    <div class="row">
      <div class="col-4">
        <div class="stat-card bg-secondary-color text-primary-color">
          <i class="fas fa-book"></i>
          <h3>1500</h3>
          <p>Total Books</p>
        </div>
      </div>
      <div class="col-4">
        <div class="stat-card bg-secondary-color text-primary-color">
          <i class="fas fa-book-open"></i>
          <h3>1000</h3>
          <p>Available Books</p>
        </div>
      </div>
      <div class="col-4">
        <div class="stat-card bg-secondary-color text-primary-color">
          <i class="fas fa-exclamation-circle"></i>
          <h3>500</h3>
          <p>Borrowed Books</p>
        </div>
      </div>
    </div>
    <!-- Create Book -->
    <div class="card mt-4">
      <div class="card-header bg-primary-color text-white">
        <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Create Book</h5>
      </div>
      <div class="card-body">
        <form id="create-book-form">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" id="title" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Author</label>
              <input type="text" class="form-control" id="author" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Description</label>
              <textarea class="form-control" id="description" required></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Category</label>
                <select class="form-control" id="category" required>
                    <option value="">Select Category</option>
                    <option value="Fiction">Computer Science</option>
                    <option value="Non-Fiction">Engineering</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">State</label>
                <select class="form-control" id="state" required>
                    <option value="Available">Available</option>
                    <option value="Borrowed">Borrowed</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Count</label>
                <input type="number" class="form-control" id="count" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Photo</label>
              <input type="file" class="form-control" id="photo">
            </div>
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary-color">Create Book</button>
            </div>
        </div>
        </form>
      </div>
    </div>

    <!-- Books -->
        <div class="card mt-4">
        <div class="card-header bg-primary-color text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i> Books List</h5>
            <div class="d-flex">
            <input type="search" class="form-control me-3" placeholder="Search books...">
            <select class="form-control me-3" id="filter-select">
                <option value="">Filter by Category</option>
                <option value="Fiction">Computer Science</option>
                <option value="Non-Fiction">Engineering</option>
            </select>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Likes</th>
                    <th>Count</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Data Visualization</td>
                    <td>Andy Kirk</td>
                    <td>100</td>
                    <td>5</td>
                    <td>2025-05-01</td>
                    <td>2025-05-18</td>
                    <td>
                    <button class="btn btn-sm badge-pending edit-book-btn"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-sm badge-approved increase-count-btn">+</button>
                    <button class="btn btn-sm badge-rejected decrease-count-btn">-</button>
                    <button class="btn btn-sm badge-rejected delete-book-btn">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>
  </div>
</div>

<?php require_once("admin-footer.php")?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

