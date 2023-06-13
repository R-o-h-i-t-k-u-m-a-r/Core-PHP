<?php

//require_once 'services/UserService.php';
require_once 'app/services/UserService.php';


class AuthController {
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            // Create a new User instance
            $user = new User($firstName, $lastName, $email, $phone, $password);

            // Validate and register the user
            $this->userService->validateRegistration($user);
            $this->userService->register($user);
        } else {
            $this->showRegistrationForm();
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate and perform user login
            $this->userService->validateLogin($email, $password);

        } else {
            $this->showLoginForm();
        }
    }

    public function logout(){
        session_start();
        $_SESSION=array();
        session_destroy();
        header("location: index.php?action=login");
    }

    public function showRegistrationForm() {
        require 'app/views/auth/register.php';
    }

    public function showLoginForm() {
        require 'app/views/auth/login.php';
    }
}
?>
