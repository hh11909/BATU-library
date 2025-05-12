<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Requests</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/admin-style.css" />
  </head>

  <body>
    <!--  Navigation -->
    <nav
      class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top p-1"
    >
      <div class="container">
        <!-- logo -->
        <a class="navbar-brand fs-4" href="../index.php">
          <img
            src="../images/logo.png"
            alt="Logo"
            width="48"
            height="48"
            class="me-2 p-1 logo"
          />
          <span class="logo-title">BATU Library</span>
        </a>
        <!-- toggle button -->
        <button
          class="navbar-toggler shadow-none"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- sidebar -->
        <div
          class="sidebar offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <!-- sidebar header -->
          <div class="offcanvas-header text-white border-bottom">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Discover</h5>
            <button
              type="button"
              class="btn-close btn-close-white shadow-none"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <!-- sidebar body -->
          <div class="offcanvas-body d-flex flex-column flex-lg-row p-lg-0 p-4">
            <ul
              class="navbar-nav justify-content-lg-end align-items-center fs-6 flex-grow-1 pe-3"
            >
              <li class="nav-item">
                <a class="nav-link mx-2" aria-current="page" href="../index.php"
                  >Home</a
                >
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="../about.php">About</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="../contact.php">Contact</a>
              </li>
              <li class="nav-item dropdown mx-2">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Services
                </a>
                <ul class="dropdown-menu mt-3">
                  <li>
                    <a class="dropdown-item" href="../Explore.php">Explore</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../Events.php">Events</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../wishlist.php">Wishlist</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../borrowed.php">Borrowed</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown mx-2" id="admin-dropdown">
                <a
                  class="nav-link dropdown-toggle active"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Admin
                </a>
                <ul class="dropdown-menu mt-3" id="admin-dropdown-menu">
                  <li>
                    <a class="dropdown-item active" href="admin-requests.php"
                      >Requests</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="admin-users.php">Users</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="admin-books.php">Books</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="admin-borrowed-books.php"
                      >Borrowed Books</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="admin-events.php">Events</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="admin-contact.php"
                      >Contact</a
                    >
                  </li>
                </ul>
              </li>
            </ul>
            <!-- log Out -->
            <div class="d-flex justify-content-center align-items-center">
              <a href="#" id="log-out" class="btn primary-color main-btn"
                >Log Out</a
              >
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
        <li class="active">
          <a href="admin-requests.php"
            ><i class="fa-solid fa-bell"></i> <span>Requests</span></a
          >
        </li>
        <li>
          <a href="admin-users.php"
            ><i class="fas fa-users"></i> <span>Users</span></a
          >
        </li>
        <li>
          <a href="admin-books.php"
            ><i class="fas fa-book"></i> <span>Books</span></a
          >
        </li>
        <li>
          <a href="admin-borrowed-books.php"
            ><i class="fas fa-book-reader"></i> <span>Borrowed Books</span></a
          >
        </li>
        <li>
          <a href="admin-events.php"
            ><i class="fas fa-calendar-alt"></i> <span>Events</span></a
          >
        </li>
        <li>
          <a href="admin-contact.php"
            ><i class="fas fa-envelope"></i> <span>Contact</span></a
          >
        </li>
      </ul>
    </div>

    <div class="main-content">
      <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="primary-color fw-bold mt-1 mb-2">
            <i class="fa-solid fa-bell me-2"></i> Requests
          </h2>
          <div class="d-flex">
            <div class="input-group me-3 mt-2" style="width: 300px">
              <input
                type="text"
                class="form-control"
                placeholder="Search requests"
              />
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Requests Tabs -->
        <ul class="nav nav-pills mb-4" id="requests-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="all-tab"
              data-bs-toggle="pill"
              data-bs-target="#all"
              type="button"
              role="tab"
            >
              All Requests <span class="badge bg-primary-color ms-1">12</span>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="book-tab"
              data-bs-toggle="pill"
              data-bs-target="#book"
              type="button"
              role="tab"
            >
              Book Requests <span class="badge bg-primary-color ms-1">8</span>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="event-tab"
              data-bs-toggle="pill"
              data-bs-target="#event"
              type="button"
              role="tab"
            >
              Event Requests <span class="badge bg-primary-color ms-1">4</span>
            </button>
          </li>
        </ul>
        <!-- Requests Content -->
        <div class="tab-content" id="requests-tabContent">
          <!-- All Requests Tab -->
          <div class="tab-pane fade show active" id="all" role="tabpanel">

            <div class="card request-card book-request mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="d-flex align-items-center mb-2">
                      <h5 class="mb-0 me-3">Book Borrowing Request</h5>
                      <span class="badge badge-pending rounded-pill"
                        >Pending</span
                      >
                    </div>
                    <p class="mb-1">
                      <strong>User:</strong> Dina Amgad (ID: 2320123)
                    </p>
                    <p class="mb-1">
                      <strong>Book:</strong> Data Visualization - BK00123
                    </p>
                    <p class="mb-1">
                      <strong>Borrow Date:</strong> May 5, 2025
                    </p>
                    <p class="mb-0">
                      <strong>Return Date:</strong> May 10, 2025
                    </p>
                  </div>
                  <div
                    class="col-md-4 d-flex align-items-center justify-content-end request-actions"
                  >
                    <button class="btn badge-approved btn-sm me-2">
                      <i class="fas fa-check"></i> Approve
                    </button>
                    <button class="btn badge-rejected btn-sm me-2">
                      <i class="fas fa-times"></i> Reject
                    </button>
                    <button class="btn btn-secondary btn-sm">
                      <i class="fas fa-envelope"></i> Message
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="card request-card event-request mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="d-flex align-items-center mb-2">
                      <h5 class="mb-0 me-3">Event Hosting Request</h5>
                      <span class="badge badge-pending rounded-pill"
                        >Pending</span
                      >
                    </div>
                    <p class="mb-1"><strong>Organizer:</strong> IT Club</p>
                    <p class="mb-1">
                      <strong>Event:</strong> Embedded Systems Workshop
                    </p>
                    <p class="mb-1">
                      <strong>Event Date:</strong> May 15, 2025
                    </p>
                    <p class="mb-1"><strong>Duration:</strong> 3 hours</p>
                    <p class="mb-0"><strong>Attendees:</strong> ~50 students</p>
                  </div>
                  <div
                    class="col-md-4 d-flex align-items-center justify-content-end request-actions"
                  >
                    <button class="btn badge-approved btn-sm me-2">
                      <i class="fas fa-check"></i> Approve
                    </button>
                    <button class="btn badge-rejected btn-sm me-2">
                      <i class="fas fa-times"></i> Reject
                    </button>
                    <button class="btn btn-secondary btn-sm">
                      <i class="fas fa-envelope"></i> Message
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="card request-card book-request mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="d-flex align-items-center mb-2">
                      <h5 class="mb-0 me-3">Book Borrowing Request</h5>
                      <span class="badge badge-pending rounded-pill"
                        >Pending</span
                      >
                    </div>
                    <p class="mb-1">
                      <strong>User:</strong> Salma Ashraf (ID: 2320456)
                    </p>
                    <p class="mb-1">
                      <strong>Book:</strong> Algorithms to Live By - BK00456
                    </p>
                    <p class="mb-1">
                      <strong>Borrow Date:</strong> May 3, 2025
                    </p>
                    <p class="mb-0">
                      <strong>Return Date:</strong> May 13, 2025
                    </p>
                  </div>
                  <div
                    class="col-md-4 d-flex align-items-center justify-content-end request-actions"
                  >
                    <button class="btn badge-approved btn-sm me-2">
                      <i class="fas fa-check"></i> Approve
                    </button>
                    <button class="btn badge-rejected btn-sm me-2">
                      <i class="fas fa-times"></i> Reject
                    </button>
                    <button class="btn btn-secondary btn-sm">
                      <i class="fas fa-envelope"></i> Message
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="card request-card event-request mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="d-flex align-items-center mb-2">
                      <h5 class="mb-0 me-3">Event Hosting Request</h5>
                      <span class="badge badge-pending rounded-pill"
                        >Pending</span
                      >
                    </div>
                    <p class="mb-1"><strong>Organizer:</strong> Teche Mental</p>
                    <p class="mb-1"><strong>Event:</strong> Career Fair</p>
                    <p class="mb-1">
                      <strong>Event Date:</strong> June 20, 2025
                    </p>
                    <p class="mb-0">
                      <strong>Reason:</strong> Date conflict with another event
                    </p>
                  </div>
                  <div
                    class="col-md-4 d-flex align-items-center justify-content-end request-actions"
                  >
                    <button class="btn badge-approved btn-sm me-2">
                      <i class="fas fa-check"></i> Approve
                    </button>
                    <button class="btn badge-rejected btn-sm me-2">
                      <i class="fas fa-times"></i> Reject
                    </button>
                    <button class="btn btn-secondary btn-sm">
                      <i class="fas fa-envelope"></i> Message
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Book Requests Tab -->
          <div class="tab-pane fade" id="book" role="tabpanel">
            <div class="card mb-4">
              <div class="card-header bg-primary-color text-white">
                <h5 class="mb-0">
                  <i class="fas fa-book me-2"></i> Book Borrowing Requests
                </h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Request ID</th>
                        <th>User</th>
                        <th>Book</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="request-card">
                        <td>BR-2025-001</td>
                        <td>Dina Amgad</td>
                        <td>Data Visualization</td>
                        <td>May 5, 2025</td>
                        <td>May 10, 2025</td>
                        <td>
                          <span class="badge badge-pending">Pending</span>
                        </td>
                        <td class="request-actions">
                          <button
                            class="btn badge-approved btn-sm me-1"
                            title="Approve"
                          >
                            <i class="fas fa-check"></i>
                          </button>
                          <button
                            class="btn badge-rejected btn-sm me-1"
                            title="Reject"
                          >
                            <i class="fas fa-times"></i>
                          </button>
                          <button
                            class="btn btn-secondary btn-sm"
                            title="Message"
                          >
                            <i class="fas fa-envelope"></i>
                          </button>
                        </td>
                      </tr>
                      <tr class="request-card">
                        <td>BR-2025-002</td>
                        <td>Salma Ashraf</td>
                        <td>Algorithms to Live By</td>
                        <td>May 3, 2025</td>
                        <td>May 13, 2025</td>
                        <td>
                          <span class="badge badge-pending">Pending</span>
                        </td>
                        <td class="request-actions">
                          <button
                            class="btn badge-approved btn-sm me-1"
                            title="Approve"
                          >
                            <i class="fas fa-check"></i>
                          </button>
                          <button
                            class="btn badge-rejected btn-sm me-1"
                            title="Reject"
                          >
                            <i class="fas fa-times"></i>
                          </button>
                          <button
                            class="btn btn-secondary btn-sm"
                            title="Message"
                          >
                            <i class="fas fa-envelope"></i>
                          </button>
                        </td>
                      </tr>
                      <tr class="request-card">
                        <td>BR-2025-003</td>
                        <td>Habiba Hesham</td>
                        <td>Intro to Python</td>
                        <td>May 1, 2025</td>
                        <td>May 5, 2025</td>
                        <td>
                          <span class="badge badge-pending">Pending</span>
                        </td>
                        <td class="request-actions">
                          <button
                            class="btn badge-approved btn-sm me-1"
                            title="Approve"
                          >
                            <i class="fas fa-check"></i>
                          </button>
                          <button
                            class="btn badge-rejected btn-sm me-1"
                            title="Reject"
                          >
                            <i class="fas fa-times"></i>
                          </button>
                          <button
                            class="btn btn-secondary btn-sm"
                            title="Message"
                          >
                            <i class="fas fa-envelope"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Event Requests Tab -->
          <div class="tab-pane fade" id="event" role="tabpanel">
            <div class="card mb-4">
              <div class="card-header bg-secondary-color primary-color">
                <h5 class="mb-0">
                  <i class="fas fa-calendar-alt me-2"></i> Event Hosting
                  Requests
                </h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Request ID</th>
                        <th>Organizer</th>
                        <th>Event</th>
                        <th>Event Date</th>
                        <th>Duration</th>
                        <th>Attendees</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="request-card">
                        <td>ER-2025-001</td>
                        <td>IT Club</td>
                        <td>Embedded Systems Workshop</td>
                        <td>May 15, 2025</td>
                        <td>3 hours</td>
                        <td>50</td>
                        <td>
                          <span class="badge badge-pending">Pending</span>
                        </td>
                        <td class="request-actions">
                          <button
                            class="btn badge-approved btn-sm me-1"
                            title="Approve"
                          >
                            <i class="fas fa-check"></i>
                          </button>
                          <button
                            class="btn badge-rejected btn-sm me-1"
                            title="Reject"
                          >
                            <i class="fas fa-times"></i>
                          </button>
                          <button
                            class="btn btn-secondary btn-sm"
                            title="Message"
                          >
                            <i class="fas fa-envelope"></i>
                          </button>
                        </td>
                      </tr>
                      <tr class="request-card">
                        <td>ER-2025-002</td>
                        <td>Teche Mental</td>
                        <td>Career Fair</td>
                        <td>June 20, 2025</td>
                        <td>2 hours</td>
                        <td>100</td>
                        <td>
                          <span class="badge badge-pending">Pending</span>
                        </td>
                        <td class="request-actions">
                          <button
                            class="btn badge-approved btn-sm me-1"
                            title="Approve"
                          >
                            <i class="fas fa-check"></i>
                          </button>
                          <button
                            class="btn badge-rejected btn-sm me-1"
                            title="Reject"
                          >
                            <i class="fas fa-times"></i>
                          </button>
                          <button
                            class="btn btn-secondary btn-sm"
                            title="Message"
                          >
                            <i class="fas fa-envelope"></i>
                          </button>
                        </td>
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
    <!-- Footer -->
    <footer class="footer py-5 text-center text-md-start">
      <div class="container-fluid">
        <div class="row">
          <!-- About Section -->
          <div class="col-md-4 mb-4">
            <div class="container">
              <div class="mb-5 mt-0 align-items-center" href="#">
                <img
                  src="../images/logo.png"
                  alt="Logo"
                  width="48"
                  height="48"
                  class="me-2 p-1 logo"
                />
                <span class="logo-title">BATU Library</span>
              </div>
              <h5
                class="text-uppercase"
                style="
                  font-family: 'Poppins';
                  font-size: 22px;
                  font-weight: 600;
                "
              >
                About Us
              </h5>
              <p>
                The BATU Library is dedicated to providing resources and spaces
                for learning, collaboration, and growth. Join us in building a
                community of knowledge.
              </p>
            </div>
          </div>
          <!-- Quick Links -->
          <div class="col-md-4 mb-4">
            <h5
              class="text-uppercase"
              style="font-family: 'Poppins'; font-size: 22px; font-weight: 600"
            >
              Quick Links
            </h5>
            <ul class="list-unstyled">
              <li>
                <a
                  href="index.php"
                  class="foorer-link text-decoration-none text-light"
                  >Home</a
                >
              </li>
              <li>
                <a
                  href="Explore.php"
                  class="foorer-link text-decoration-none text-light"
                  >Categories</a
                >
              </li>
              <li>
                <a
                  href="wishlist.php"
                  class="foorer-link text-decoration-none text-light"
                  >Wishlist</a
                >
              </li>
              <li>
                <a
                  href="index.php#fqa"
                  class="foorer-link text-decoration-none text-light"
                  >FAQs</a
                >
              </li>
              <li>
                <a
                  href="about.php"
                  class="foorer-link text-decoration-none text-light"
                  >About Us</a
                >
              </li>
            </ul>
          </div>
          <!-- Contact Section -->
          <div class="col-md-4 mb-4">
            <h5
              class="text-uppercase"
              style="font-family: 'Poppins'; font-size: 22px; font-weight: 600"
            >
              Contact Us
            </h5>
            <p>
              <strong>Email:</strong> @batulibrary.com<br />
              <strong>Phone:</strong> +1 234 567 8900<br />
              <strong>Address:</strong> BATU
            </p>
            <div class="social-icons">
              <a href="#" class="text-light me-3 fs-4 p-2"
                ><i class="fa-brands facebook fa-square-facebook"></i
              ></a>
              <a href="#" class="text-light me-3 fs-4 p-2"
                ><i class="fa-brands youtube fa-square-youtube"></i
              ></a>
              <a href="#" class="text-light me-3 fs-4 p-2"
                ><i class="fa-brands linkedin fa-linkedin"></i
              ></a>
              <a href="#" class="text-light me-3 fs-4 p-2"
                ><i class="fa-brands instagram fa-instagram"></i
              ></a>
            </div>
          </div>
        </div>
        <hr class="border-light" />
        <div class="row">
          <div class="col-md-12 text-center">
            <p class="mb-0">
              &copy; 2024
              <span class="fw-bold" style="color: aquamarine"
                >BATU Library </span
              >. All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Request actions
      document.addEventListener("DOMContentLoaded", function () {
        // Approved button
        document.querySelectorAll(".badge-approved").forEach((button) => {
          button.addEventListener("click", function () {
            const card = this.closest(".request-card");
            const statusBadge = card.querySelector(".badge");
            statusBadge.className = "badge badge-approved rounded-pill";
            statusBadge.textContent = "Approved";

            // Change buttons
            const actionsDiv = card.querySelector(".request-actions");
            actionsDiv.innerHTML = `
        <button class="btn btn-sm me-2" id="details-btn"><i class="fas fa-eye"></i> Details</button>
        <button class="btn btn-secondary btn-sm"><i class="fas fa-envelope"></i> Message</button>`;
          });
        });

        // Rejected button
        document.querySelectorAll(".badge-rejected").forEach((button) => {
          button.addEventListener("click", function () {
            const card = this.closest(".request-card");
            const statusBadge = card.querySelector(".badge");
            statusBadge.className = "badge badge-rejected rounded-pill";
            statusBadge.textContent = "Rejected";

            // Change buttons
            const actionsDiv = card.querySelector(".request-actions");
            actionsDiv.innerHTML = `
        <button class="btn btn-sm me-2" id="details-btn"><i class="fas fa-eye"></i> Details</button>
        <button class="btn btn-secondary btn-sm"><i class="fas fa-envelope"></i> Message</button>`;
          });
        });
      });
    </script>
  </body>
</html>