<?php

namespace Model;

/**@var mysqli */
$cn = mysqli_connect(DB_HOST_NAME, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME, DB_PORT);
if (!$cn) {
  die("connection failed: " . mysqli_connect_error());
  # mysqli_close($cn);
}
