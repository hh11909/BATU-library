<?php

namespace controller;

use model;
use model\Crud;
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
      return error422("Image size should not exceed 2MB.", 13);
    } else {
      $new_image = uniqid($x, true) . '.' . $image_ext;
      if (!move_uploaded_file($image_tmp, __DIR__ . "/../pages/" . $path . $new_image)) {
        return error422("Failed to upload the image. Please try again.", 500);
      }
    }
    $data = [
      "status" => 200,
      "Message" => "SUCCESS",
      "data" => $path . $new_image
    ];
    return json_encode($data);
  }
  static function deleteImage($imageColName, $colname, $colval, $table)
  {
    $result = Crud::read($table, [$colname], [$colval]);
    $result = json_decode($result, true);
    $result = $result["data"];
    if (isset($result)) {
      $result = $result[0];
      $oldPath = __DIR__ . "/../pages/" . $result[$imageColName];
      if (file_exists($oldPath)) {
        unlink($oldPath);
        Crud::update($table, [$imageColName], [""], [$colname], [$colval]);
      }
    }
    $data = [
      "status" => 200,
      "Message" => " Image deleted successfully",
    ];
    return json_encode($data);
  }
  static function updateImage($x, $path, $image, $imageColName, $colname, $colval, $table)
  {

    $result = Crud::read($table, [$colname], [$colval]);
    $result = json_decode($result, true);
    $result = $result["data"];
    if (isset($result)) {
      $result = $result[0];
      $oldPath = __DIR__ . "/../pages/" . $result[$imageColName];
      if (file_exists($oldPath)) {
        unlink($oldPath);
      }
      $image_name = $image['name'];
      $image_tmp  = $image['tmp_name'];
      $image_size = $image['size'];
      $path = "images/" . $path;
      $image_ext  = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
      $allowed_ext = ['jpg', 'jpeg', 'png'];
      if (!in_array($image_ext, $allowed_ext)) {
        return error422("Invalid Image extension , please enter: file.jpg /file.jpeg /file.png !");
      } elseif ($image_size > 2 * 1024 * 1024) {
        return error422("Image size should not exceed 2MB.", 13);
      } else {
        $new_image = uniqid($x, true) . '.' . $image_ext;
        if (!move_uploaded_file($image_tmp, __DIR__ . "/../pages/" . $path . $new_image)) {
          return error422("Failed to upload the image. Please try again.", 500);
        }
      }
    }

    $data = [
      "status" => 200,
      "Message" => " Image updated successfully",
      "data" => $path . $new_image
    ];
    return json_encode($data);
  }
}
