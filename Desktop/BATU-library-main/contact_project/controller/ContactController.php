<?php
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../model/Contact.php';

class ContactController {
    private $db;
    private $contactModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->contactModel = new Contact($this->db);
    }

    // إنشاء رسالة جديدة
    public function create($data) {
        $this->contactModel->name = $data['name'];
        $this->contactModel->email = $data['email'];
        $this->contactModel->message = $data['message'];
        // student_ID هو اختياري بناءً على الصورة (?student_ID)
        $this->contactModel->student_ID = isset($data['student_ID']) ? $data['student_ID'] : null;

        if($this->contactModel->createMessage()) {
            return array("status" => true, "message" => "Message created successfully.", "contact_id" => $this->contactModel->contact_ID);
        } else {
            return array("status" => false, "message" => "Message could not be created.");
        }
    }

    // قراءة جميع الرسائل
    public function readAll() {
        $stmt = $this->contactModel->readAllMessages();
        $num = $stmt->rowCount();

        if($num > 0) {
            $messages_arr = array();
            $messages_arr["records"] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $message_item = array(
                    "contact_ID" => $contact_ID,
                    "name" => $name,
                    "email" => $email,
                    "message" => $message,
                    "student_ID" => $student_ID
                );
                array_push($messages_arr["records"], $message_item);
            }
            return array("status" => true, "data" => $messages_arr);
        } else {
            return array("status" => false, "message" => "No messages found.");
        }
    }

    // قراءة رسالة واحدة بواسطة ID
    public function readOne($id) {
        $this->contactModel->contact_ID = $id;
        if ($this->contactModel->readMessageById()) {
            $message_item = array(
                "contact_ID" => $this->contactModel->contact_ID,
                "name" => $this->contactModel->name,
                "email" => $this->contactModel->email,
                "message" => $this->contactModel->message,
                "student_ID" => $this->contactModel->student_ID
            );
            return array("status" => true, "data" => $message_item);
        } else {
            return array("status" => false, "message" => "Message not found.");
        }
    }

    // تحديث رسالة
    public function update($id, $data) {
        $this->contactModel->contact_ID = $id;
        // التأكد من أن البيانات المطلوبة موجودة قبل محاولة التحديث
        $this->contactModel->name = isset($data['name']) ? $data['name'] : null;
        $this->contactModel->email = isset($data['email']) ? $data['email'] : null;
        $this->contactModel->message = isset($data['message']) ? $data['message'] : null;
        $this->contactModel->student_ID = isset($data['student_ID']) ? $data['student_ID'] : null;

        // التحقق من أن هناك بيانات فعلية للتحديث
        if ($this->contactModel->name === null && $this->contactModel->email === null && $this->contactModel->message === null && $this->contactModel->student_ID === null) {
             return array("status" => false, "message" => "No data provided for update.");
        }

        // قبل التحديث، قد نرغب في قراءة البيانات الحالية لملء أي حقول لم يتم توفيرها في $data
        // هذا يمنع مسح البيانات الموجودة بقيم NULL إذا لم يتم توفيرها في الطلب
        // هذه الخطوة اختيارية وتعتمد على منطق التطبيق المطلوب
        $current_data = new Contact($this->db);
        $current_data->contact_ID = $id;
        if ($current_data->readMessageById()) {
            if ($this->contactModel->name === null) $this->contactModel->name = $current_data->name;
            if ($this->contactModel->email === null) $this->contactModel->email = $current_data->email;
            if ($this->contactModel->message === null) $this->contactModel->message = $current_data->message;
            // بالنسبة لـ student_ID، إذا كان null في الطلب، قد يعني ذلك إزالته أو تركه كما هو
            // هنا، إذا لم يتم توفيره، سنحتفظ بالقيمة الحالية
            if (!array_key_exists('student_ID', $data)) $this->contactModel->student_ID = $current_data->student_ID;
        }

        if($this->contactModel->updateMessage()) {
            return array("status" => true, "message" => "Message updated successfully.");
        } else {
            return array("status" => false, "message" => "Message could not be updated. It might not exist or data is unchanged.");
        }
    }

    // حذف رسالة
    public function delete($id) {
        $this->contactModel->contact_ID = $id;
        if($this->contactModel->deleteMessage()) {
            return array("status" => true, "message" => "Message deleted successfully.");
        } else {
            return array("status" => false, "message" => "Message could not be deleted. It might not exist.");
        }
    }
}
?>
