<?php
class Database
{
    private $conn;

    public function __construct()
    {
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = 'password';
        $dbName = 'php_trip';

        $this->conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>
