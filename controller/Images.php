<?php
namespace controller;
use model;
require("../model/errors");
require("../model/Book");
class Images{

    static function createImage($x ,$path ,$image){
        $image_name = $image['name'];       
        $image_tmp  = $image['tmp_name'];        
        $image_size = $image['size'];           
        $image_ext  = strtolower(pathinfo($image_name, PATHINFO_EXTENSION)); 
        $allowed_ext = ['jpg', 'jpeg', 'png'];  
       if (!in_array($image_ext, $allowed_ext)) {
       return error422("Invalid Image extension , please enter: file.jpg /file.jpeg /file.png !");   
      }
      elseif ($image_size > 2 * 1024 * 1024) {
      return error413("Image size should not exceed 2MB.");
     } 
        else{$new_image= uniqid($x, true) . '.' . $image_ext;
       move_uploaded_file($image_tmp, $path . $new_image);

        }
     return $path.$new_image ;
    }
    static function deleteImage($path ,$image){
        $bookModel = new model\Book();
        $result = $bookModel->delete("image", $path.$image);  

}











}