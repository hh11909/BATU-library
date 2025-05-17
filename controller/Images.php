<?php

namespace controller;

use model;
// require("../model/errors");
require_once(__DIR__ . "/../model/Book.php");
class Images
{

  static function createImage($x, $path, $image)
  {
    $image_name = $image['name'];
    $image_tmp  = $image['tmp_name'];
    $image_size = $image['size'];
    $path = "images/" . $path;
    $image_ext  = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $allowed_ext = ['jpg', 'jpeg', 'png'];
    if (!in_array($image_ext, $allowed_ext)) {
      return error422("Invalid Image extension , please enter: file.jpg /file.jpeg /file.png !");
    } elseif ($image_size > 2 * 1024 * 1024) {
      return error413("Image size should not exceed 2MB.");
    } else {
      $new_image = uniqid($x, true) . '.' . $image_ext;
      if (!move_uploaded_file($image_tmp, __DIR__ . "/../pages/" . $path . $new_image)) {
        return error422("Failed to upload the image. Please try again.", 500);
      }
    }
    $data = [
      "status" => 200,
      "Message" => "SUCCESS",
      "data" => '/pages/' . $path . $new_image
    ];
    return json_encode($data);
  }
  static function deleteImage($path, $image)
  {
    $bookModel = new model\Book();
    $result = $bookModel->delete("image", $path . $image);
  }
}

