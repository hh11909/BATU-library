<?php
require_once __DIR__ . 
'/../../config/db.php

';
require_once __DIR__ . 
'/ContactController.php

'; // To reuse the readAll and delete logic

class AdminController {
    private $contactController;

    public function __construct() {
        // Similar to StudentController, delegate to ContactController
        $this->contactController = new ContactController();
    }

    // Admin reading all contact messages
    public function readAllMessages() {
        // Directly call the readAll method of ContactController
        return $this->contactController->readAll();
    }

    // Admin deleting a contact message
    public function deleteMessage($id) {
        // Directly call the delete method of ContactController
        // The ContactController's delete method takes the ID of the message to be deleted
        return $this->contactController->delete($id);
    }
}
?>
