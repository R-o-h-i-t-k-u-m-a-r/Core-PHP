<?php
require_once 'app/config/Database.php';
require_once 'app/repositories/UserRepositoryInterface.php';
require_once 'app/models/User.php';


class MySQLiUserRepository implements UserRepositoryInterface
{
    private $db;
    //private $user = new User($firstName, $lastName, $email, $phone, $password);

    public function __construct()
    {
        $this->db = new Database();
    }

    public function validateLogin($email, $password)
    {
        $mysqli = $this->db->getConnection();

        // Sanitize the input
        $email = $mysqli->real_escape_string($email);
        $password = $mysqli->real_escape_string($password);

        // Retrieve the user from the database based on the provided email
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $mysqli->query($query);

        if ($result && $result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct, perform login logic
                session_start();
                $_SESSION["loggedin"]=true;
                $_SESSION['user_name']=$user['first_name'];
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php?action=viewTasks');
                exit;
            } else {
                // Invalid password
                echo "Invalid email or password.";
            }
        } else {
            // User not found
            echo "Invalid email or password.";
        }
    }

    public function validateRegistration($user) 
    {
        $mysqli = $this->db->getConnection();

        // Sanitize the input
        $firstName = $mysqli->real_escape_string($user->getFirstName());
        $lastName = $mysqli->real_escape_string($user->getLastName());
        $email = $mysqli->real_escape_string($user->getEmail());
        $phone = $mysqli->real_escape_string($user->getPhone());
        $password = $mysqli->real_escape_string($user->getPassword());

        // Check if the email is already registered
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $mysqli->query($query);

        if ($result && $result->num_rows > 0) {
            // Email is already registered
            //echo "Email is already registered.";
            echo "<script>
                    alert('Email is already registered');
                    window.location.href='index.php';
                    </script>";
            exit;
        }
    }

    public function register($user)
    {
        $mysqli = $this->db->getConnection();

        // Sanitize the input
        $firstName = $mysqli->real_escape_string($user->getFirstName());
        $lastName = $mysqli->real_escape_string($user->getLastName());
        $email = $mysqli->real_escape_string($user->getEmail());
        $phone = $mysqli->real_escape_string($user->getPhone());
        $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);

        // Insert the user into the database
        $query = "INSERT INTO users (first_name, last_name, email, phone, password)
                  VALUES ('$firstName', '$lastName', '$email', '$phone', '$password')";
        $result = $mysqli->query($query);

        if ($result) {
            //echo "Registration successful!";
            echo "<script>
                    alert('Registration successful!');
                    window.location.href='index.php?action=login';
                    </script>";
        } else {
            echo "Registration failed.";
        }
    }

  
}
?>
