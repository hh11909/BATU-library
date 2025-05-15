<?php
class Database {
    private $host = "localhost"; // أو عنوان IP لخادم قاعدة البيانات
    private $db_name = "your_database_name"; // اسم قاعدة البيانات التي ستقدمها
    private $username = "your_username"; // اسم مستخدم قاعدة البيانات
    private $password = "your_password"; // كلمة مرور قاعدة البيانات
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
