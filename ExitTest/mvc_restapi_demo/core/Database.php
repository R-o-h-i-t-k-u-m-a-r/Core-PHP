<!-- This file will handle the database connection and provide methods for executing SQL queries. -->
<?php
class Database {
    private $conn;

    public function __construct($hostname, $username, $password, $dbname) {
        $this->conn = new mysqli($hostname, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function executeQuery($sql) {
        return $this->conn->query($sql);
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
