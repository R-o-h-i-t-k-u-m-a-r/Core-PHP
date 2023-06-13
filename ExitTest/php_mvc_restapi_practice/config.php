<?php

// Database configuration
$host = "localhost";
$username = "root";
$password = "password";
$database = "php_trip";

$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

?>
