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
    <li>
      <a href="admin-books.php"><i class="fas fa-book"></i> <span>Books</span></a>
    </li>
    <li class="active">
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
      <h2 class="primary-color fw-bold mt-1 mb-2"><i class="fas fa-book-reader me-2"></i> Borrowed Books</h2>
      <div class="d-flex">
        <div class="input-group me-3 mt-2" style="width: 300px;">
          <input type="text" class="form-control" placeholder="Search borrowed books">
          <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-6">
        <div class="stat-card">
          <i class="fas fa-book"></i>
          <h3>1,250</h3>
          <p>Total Books</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6">
        <div class="stat-card">
          <i class="fas fa-book-open"></i>
          <h3>342</h3>
          <p>Borrowed Books</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6">
        <div class="stat-card">
          <i class="fas fa-exclamation-circle"></i>
          <h3>27</h3>
          <p>Overdue Books</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="stat-card">
          <i class="fas fa-check-circle"></i>
          <h3>198</h3>
          <p>Returned This Month</p>
        </div>
      </div>
    </div>

    <!-- Borrowed Books Table -->
    <div class="card mt-4">
      <div class="card-header bg-primary-color text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-list me-2"></i> Borrowed Books List</h5>
        <div class="dropdown" id="borrowed-dropdown">
          <button class="btn btn-sm btn-light dropdown-toggle  primary-color" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Filter
          </button>
          <ul class="dropdown-menu dropdown-menu-end" id="borrowed-dropdown-menu" aria-labelledby="filterDropdown">
            <li><a class="dropdown-item" href="#">All</a></li>
            <li><a class="dropdown-item" href="#">Borrowed</a></li>
            <li><a class="dropdown-item" href="#">Returned</a></li>
            <li><a class="dropdown-item" href="#">Overdue</a></li>
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
                <th>Book Title</th>
                <th>Book ID</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2320123</td>
                <td>Dina Amgad</td>
                <td>Data Visualization</td>
                <td>BK00123</td>
                <td>2025-05-01</td>
                <td>2025-05-07</td>
                <td><span>Returned</span></td>
                <td>
                  <button class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></button>
                </td>
              </tr>
              <tr>
                <td>2320456</td>
                <td>Salma Ashraf</td>
                <td>Algorithms to Live By</td>
                <td>BK00456</td>
                <td>2025-05-10</td>
                <td>2025-05-24</td>
                <td><span>Borrowed</span></td>
                <td>
                  <button class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></button>
                </td>
              </tr>
              <tr>
                <td>2320789</td>
                <td>Habiba Hesham</td>
                <td>Intro to Python</td>
                <td>BK00125</td>
                <td>2024-04-25</td>
                <td>2024-05-09</td>
                <td><span>Overdue</span></td>
                <td>
                  <button class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></button>
                </td>
              </tr>
              <tr>
                <td>2320987</td>
                <td>Rose Ahmed</td>
                <td>Algorithmic Intelligence</td>
                <td>BK00126</td>
                <td>2025-05-05</td>
                <td>2025-05-19</td>
                <td><span>Borrowed</span></td>
                <td>
                  <button class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></button>
                </td>
              </tr>
              <tr>
                <td>2320628</td>
                <td>Aya Hany</td>
                <td>Kali Linux</td>
                <td>BK00127</td>
                <td>2025-04-15</td>
                <td>2025-04-29</td>
                <td><span>Returned</span></td>
                <td>
                  <button class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></button>
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

    <!-- Overdue Books Section -->
    <div class="card mt-4">
      <div class="card-header bg-primary-color text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-exclamation-circle me-2"></i> Overdue Books</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Borrower</th>
                <th>Book Title</th>
                <th>Days Overdue</th>
                <th>Contact</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Dina Amgad</td>
                <td>Computer Architecture</td>
                <td>3 days</td>
                <td><a href="mailto:dina.amgad@gmail.com" class="btn btn-sm btn-outline-primary btn-secondary-color"><i class="fas fa-envelope"></i></a></td>
              </tr>
              <tr>
                <td>Salma Ashraf</td>
                <td>Artificial Intelligence</td>
                <td>1 day</td>
                <td><a href="mailto:salma.ashraf@gmail.com" class="btn btn-sm btn-outline-primary btn-secondary-color"><i class="fas fa-envelope"></i></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Manual Book Borrowing Form -->
    <div class="card mt-4">
      <div class="card-header bg-primary-color text-white">
        <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Manually Borrow Book</h5>
      </div>
      <div class="card-body">
        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">User ID</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Enter user ID">
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Book ID</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-book-open"></i></span>
                <input type="text" class="form-control" placeholder="Enter book ID">
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label"> Date</label>
              <input type="date" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Due Date</label>
              <input type="date" class="form-control">
            </div>
            <div class="col-12 text-end">
              <button type="submit" class="btn btn-secondary-color">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

 <?php require_once("admin-footer.php")?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>