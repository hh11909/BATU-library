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

      <!-- Stats Cards -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-6">
          <div class="stat-card">
            <i class="fa-solid fa-user-tie"></i>
            <h3>5</h3>
            <p>Total admins</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-6">
          <div class="stat-card">
            <i class="fa-solid fa-user"></i>
            <h3 id="total-students"></h3>
            <p>Total students</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-6">
          <div class="stat-card">
            <i class="fa-solid fa-user-group"></i>
            <h3 id="total-friends"></h3>
            <p>Total Freinds</p>
          </div>
        </div>
      </div>

      <!-- users Table -->
      <div class="card mt-4">
        <div class="card-header bg-primary-color text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="fas fa-list me-2"></i> Students table </h5>
          <div class="dropdown" id="borrowed-dropdown">
            <button class="btn btn-sm btn-light dropdown-toggle  primary-color" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              Department
            </button>
            <ul class="dropdown-menu dropdown-menu-end" id="borrowed-dropdown-menu" aria-labelledby="filterDropdown">
              <li><a class="dropdown-item" href="#">ID</a></li>
              <li><a class="dropdown-item" href="#">Name</a></li>
              <li><a class="dropdown-item" href="#">Phone</a></li>
            </ul>
          </div>
          <div class="dropdown" id="borrowed-dropdown">
            <button class="btn btn-sm btn-light dropdown-toggle  primary-color" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              College
            </button>
            <ul class="dropdown-menu dropdown-menu-end" id="borrowed-dropdown-menu" aria-labelledby="filterDropdown">
              <li><a class="dropdown-item" href="#">ID</a></li>
              <li><a class="dropdown-item" href="#">Name</a></li>
              <li><a class="dropdown-item" href="#">Phone</a></li>
            </ul>
          </div>
          <div class="dropdown" id="borrowed-dropdown">
            <button class="btn btn-sm btn-light dropdown-toggle  primary-color" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              Academic year
            </button>
            <ul class="dropdown-menu dropdown-menu-end" id="borrowed-dropdown-menu" aria-labelledby="filterDropdown">
              <li><a class="dropdown-item" href="#">all</a></li>
              <li><a class="dropdown-item" href="#">1</a></li>
              <li><a class="dropdown-item" href="#">2</a></li>
              <li><a class="dropdown-item" href="#">3</a></li>
              <li><a class="dropdown-item" href="#">4</a></li>
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
              <tbody id="stu-table">
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


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php require_once("admin-footer.php") ?>

    <!-- Bootstrap JS -->
    <script src="../js/handle-user.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
