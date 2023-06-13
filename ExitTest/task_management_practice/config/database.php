<?php
// Database Configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'password';
$dbName = 'php_trip';

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
