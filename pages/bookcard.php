<?php require_once(__DIR__."/header.php")?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body style="padding-top: 70px;">
    <style>
        /* newly added css */
        .badge {
            font-size: 10px;
            padding: 4px 8px;
            border-radius: 4px;
            background-color: #a8d5ba43;
            color: var(--primary-color);
        }

        .btn-secondary-color {
            background-color: #a8d5bac1;
            color: var(--primary-color);
            font-size: 1rem;
            font-weight: bolder;
        }
    </style>
    <!-- book -->
    <div class="col-lg-2 col-md-4 col-sm-6 col-6 mb-4">
        <div class="card h-100 border-0">
            <!-- data-bs-toggle="modal" data-bs-target="#bookModal" is newly added -->
            <img src="wishlist-images/book1.jpg" class="card-img-top img-fluid mx-auto d-block border border-light" style="max-width: 150px; margin: 20px auto;" alt="Book Cover" data-bs-toggle="modal" data-bs-target="#bookModal">
            <!-- justify-content-between align-items-center is newly added -->
            <div class="d-flex pe-2 justify-content-between align-items-center">
                <!-- the span is a newly added line -->
                <span class="badge ms-2">Computer Science</span>
                <div class="ms-auto">
                    <button class="btn btn-link"><i class="fa-solid fa-heart"></i></button>
                    <button class="btn btn-link ms-2"><i class="fa-solid fa-bookmark"></i></button>
                </div>
            </div>
            <div class="card-body p-2">
                <!-- data-bs-toggle="modal" data-bs-target="#bookModal" is newly added-->
                <h5 class="card-title" data-bs-toggle="modal" data-bs-target="#bookModal">Python Programming for Biology</h5>
                <p class="card-text">Tim J. Stevens</p>
            </div>
        </div>
    </div>
    <!-- Modal example for the books-->
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="wishlist-images/book1.jpg" class="img-fluid rounded mx-auto d-block mt-4" style="max-width: 200px; margin-bottom: 20px;" alt="Book Cover">
                    <h5 class="text-center mb-3">Python Programming for Biology</h5>
                    <p class="text-center mb-2">Tim J. Stevens</p>
                    <p class="text-center mb-3 primary-color fw-semibold">Computer Science</p>
                    <p class="text-justify">A practical guide that introduces biologists and researchers to programming with Python. It covers essential programming concepts and applies them to real-world problems in bioinformatics and computational biology, making it ideal for beginners with little to no prior coding experience.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary-color px-4 py-2" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>