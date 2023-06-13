<?php

class Auth
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function registerUser($firstName, $lastName, $email, $phone, $password)
    {
        // Check if the email already exists
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return false; // Email already exists
        }

        // Create a new user
        $query = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $password);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            return true; // User registered successfully
        } else {
            return false; // Registration failed
        }
    }

    public function loginUser($email, $password)
    {
        // Retrieve the user record by email
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                return $user; // Login successful
            }
        }

        return null; // Login failed
    }
}
