<?php
require_once __DIR__ . '/../config/db.php';

class Contact {
    private $conn;
    private $table_name = "contact"; // اسم الجدول في قاعدة البيانات

    // خصائص الكائن (مطابقة لأعمدة جدول contact)
    public $contact_ID;
    public $name;
    public $email;
    public $message;
    public $student_ID; // قد يكون null إذا كان اختياريًا

    // المُنشئ مع $db كـ اتصال بقاعدة البيانات
    public function __construct($db) {
        $this->conn = $db;
    }

    // دالة لإنشاء رسالة جديدة
    function createMessage() {
        // استعلام الإدخال
        $query = "INSERT INTO " . $this->table_name . "
                  SET name=:name, email=:email, message=:message, student_ID=:student_ID";

        // تجهيز الاستعلام
        $stmt = $this->conn->prepare($query);

        // تعقيم البيانات (Sanitize)
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->message = htmlspecialchars(strip_tags($this->message));
        if ($this->student_ID !== null) {
            $this->student_ID = htmlspecialchars(strip_tags($this->student_ID));
        } else {
            // إذا كان student_ID اختياريًا ويمكن أن يكون NULL في قاعدة البيانات
            // لا نحتاج لـ htmlspecialchars إذا كان سيتم تمريره كـ null مباشرة
        }

        // ربط القيم
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":message", $this->message);
        
        // التعامل مع student_ID الاختياري
        if ($this->student_ID !== null) {
            $stmt->bindParam(":student_ID", $this->student_ID);
        } else {
            // إذا كان العمود يقبل NULL، يمكن ربطه كـ PDO::PARAM_NULL
            // أو التأكد من أن الاستعلام SQL يتعامل مع NULL بشكل صحيح إذا لم يتم ربط المتغير
            // الطريقة الأبسط هي تعديل الاستعلام ليناسب الحالة أو التأكد من أن student_ID يُمرر كـ null
            // هنا نفترض أن student_ID إذا كان null، فسيتم إدخاله كـ NULL في قاعدة البيانات
            // إذا كان العمود لا يقبل NULL وكان student_ID مطلوبًا دائمًا، يجب إزالة هذا الشرط
            // بناءً على الصورة `?student_ID`، نفترض أنه اختياري.
            $stmt->bindValue(":student_ID", $this->student_ID, PDO::PARAM_NULL);
        }

        // تنفيذ الاستعلام
        if($stmt->execute()) {
            $this->contact_ID = $this->conn->lastInsertId(); // الحصول على ID الرسالة المُضافة
            return true;
        }
        return false;
    }

    // دالة لقراءة كل الرسائل (سيتم إضافتها لاحقًا)
    // دالة لقراءة رسالة واحدة بواسطة ID (سيتم إضافتها لاحقًا)
    // دالة لتحديث رسالة (سيتم إضافتها لاحقًا)
    // دالة لحذف رسالة (سيتم إضافتها لاحقًا)
}
?>


    // دالة لقراءة كل الرسائل
    function readAllMessages() {
        // استعلام الاختيار
        $query = "SELECT
                    contact_ID, name, email, message, student_ID
                  FROM
                    " . $this->table_name . "
                  ORDER BY
                    contact_ID DESC"; // أو أي ترتيب آخر مناسب

        // تجهيز الاستعلام
        $stmt = $this->conn->prepare($query);

        // تنفيذ الاستعلام
        $stmt->execute();

        return $stmt;
    }



    // دالة لقراءة رسالة واحدة بواسطة ID
    function readMessageById() {
        // استعلام الاختيار
        $query = "SELECT
                    contact_ID, name, email, message, student_ID
                  FROM
                    " . $this->table_name . "
                  WHERE
                    contact_ID = ?
                  LIMIT
                    0,1";

        // تجهيز الاستعلام
        $stmt = $this->conn->prepare($query);

        // ربط ID الرسالة التي سيتم قراءتها
        $stmt->bindParam(1, $this->contact_ID);

        // تنفيذ الاستعلام
        $stmt->execute();

        // الحصول على الصف المسترجع
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // تعيين قيم الخصائص للكائن
        if ($row) {
            $this->name = $row['name'];
            $this->email = $row['email'];
            $this->message = $row['message'];
            $this->student_ID = $row['student_ID'];
            return true; // تمت القراءة بنجاح
        }
        return false; // لم يتم العثور على الرسالة
    }



    // دالة لتحديث رسالة قائمة
    function updateMessage() {
        // استعلام التحديث
        // يجب التأكد من أن كل الحقول التي يمكن تحديثها موجودة هنا
        // وأن القيم الفارغة أو التي لم يتم تمريرها لا تقوم بمسح البيانات الموجودة إذا لم يكن ذلك مطلوبًا
        $query = "UPDATE " . $this->table_name . "
                  SET
                    name = :name,
                    email = :email,
                    message = :message,
                    student_ID = :student_ID
                  WHERE
                    contact_ID = :contact_ID";

        // تجهيز الاستعلام
        $stmt = $this->conn->prepare($query);

        // تعقيم البيانات
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->message = htmlspecialchars(strip_tags($this->message));
        $this->contact_ID = htmlspecialchars(strip_tags($this->contact_ID));
        if ($this->student_ID !== null) {
            $this->student_ID = htmlspecialchars(strip_tags($this->student_ID));
        }        

        // ربط القيم الجديدة
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":message", $this->message);
        $stmt->bindParam(":contact_ID", $this->contact_ID);

        if ($this->student_ID !== null) {
            $stmt->bindParam(":student_ID", $this->student_ID);
        } else {
            $stmt->bindValue(":student_ID", null, PDO::PARAM_NULL);
        }

        // تنفيذ الاستعلام
        if($stmt->execute()) {
            // التحقق مما إذا تم تحديث أي صفوف
            if($stmt->rowCount() > 0){
                return true; // تم التحديث بنجاح
            } else {
                // لم يتم تحديث أي صف (قد يكون بسبب عدم وجود سجل مطابق أو أن البيانات الجديدة هي نفسها القديمة)
                return false; 
            }
        }
        return false; // فشل التنفيذ
    }



    // دالة لحذف رسالة
    function deleteMessage() {
        // استعلام الحذف
        $query = "DELETE FROM " . $this->table_name . " WHERE contact_ID = :contact_ID";

        // تجهيز الاستعلام
        $stmt = $this->conn->prepare($query);

        // تعقيم البيانات
        $this->contact_ID = htmlspecialchars(strip_tags($this->contact_ID));

        // ربط id السجل الذي سيتم حذفه
        $stmt->bindParam(":contact_ID", $this->contact_ID);

        // تنفيذ الاستعلام
        if($stmt->execute()) {
            // التحقق مما إذا تم حذف أي صفوف
            if($stmt->rowCount() > 0){
                return true; // تم الحذف بنجاح
            } else {
                // لم يتم حذف أي صف (قد يكون بسبب عدم وجود سجل مطابق)
                return false; 
            }
        }
        return false; // فشل التنفيذ
    }
}
