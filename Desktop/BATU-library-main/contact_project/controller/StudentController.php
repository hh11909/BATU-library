<?php
require_once __DIR__ . 
'/../config/db.php
';
require_once __DIR__ . 
'/ContactController.php
'; // To reuse the create logic

class StudentController {
    private $contactController;

    public function __construct() {
        // No direct DB connection needed here if we are delegating to ContactController
        // However, ContactController instantiates its own DB connection.
        // For simplicity, we'll let ContactController handle its DB and Model instantiation.
        $this->contactController = new ContactController(); 
    }

    // Student creating a contact message
    public function createMessage($data) {
        // The student_ID should ideally be part of the $data payload or fetched from session/auth
        // The image shows createMessage(name,email,Message,?student_ID)
        // We assume $data will contain name, email, message, and optionally student_ID
        
        // We can directly call the create method of ContactController
        // The ContactController's create method already handles the optional student_ID
        return $this->contactController->create($data);
    }
}
?>
