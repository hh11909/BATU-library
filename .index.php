<?php

# require_once(__DIR__ . "/model/Admin");
require_once __DIR__ . "/vendor/autoload.php";

use controller\Admin;





$model = Admin::login("admin@amr.com", "1234");
echo $model->to_json();
