<?php
// Database configuration
class Database {
    private $host = 'your_host';
    private $db_name = 'your_database';
    private $username = 'your_username';
    private $password = 'your_password';
    private $port = 3306;
    public $conn;

    // Создание подключения к базе данных
    public function getConnection() {
        $this->conn = null;

        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
