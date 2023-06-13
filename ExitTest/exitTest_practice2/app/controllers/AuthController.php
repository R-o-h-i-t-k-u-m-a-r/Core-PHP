<?php

require_once '<div class="">models/Auth.php';

class AuthController
{
    private $authModel;

    public function __construct($conn)
    {
        $this->authModel = new Auth($conn);
    }

    public function register()
    {
        // Handle the registration form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $registered = $this->authModel->registerUser($firstName, $lastName, $email, $phone, $password);

            if ($registered) {
                // Redirect to the login page upon successful registration
                header('Location: ../app/views/auth/login.php');
                exit;
            } else {
                // Handle the registration failure, e.g., display an error message
            }
        }

        // Display the registration form
        require_once 'views/auth/register.php';
    }

    public function login()
    {
        // Handle the login form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->authModel->loginUser($email, $password);

            if ($user) {
                // Start the session and store the user ID
                session_start();
                $_SESSION['user_id'] = $user['id'];

                // Redirect to the task list upon successful login
                header('Location: /task.php');
                exit;
            } else {
                // Handle the login failure, e.g., display an error message
            }
        }

        // Display the login form
        require_once 'views/auth/login.php';
    }

    public function logout()
    {
        // Destroy the session and redirect to the login page
        session_start();
        session_destroy();
        header('Location: /login.php');
        exit;
    }
}
