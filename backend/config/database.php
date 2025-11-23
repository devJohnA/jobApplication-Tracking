<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'jobtracking';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function connect() {
        if ($this->conn) return $this->conn; 

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
            return $this->conn;
        } catch (PDOException $e) {
            error_log("Database connection error: " . $e->getMessage());
            die("Could not connect to the database. Please try again later.");
        }
    }
}

$db = new Database();
$pdo = $db->connect();