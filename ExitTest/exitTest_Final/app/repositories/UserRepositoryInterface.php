<?php
require 'app/models/User.php';

interface UserRepositoryInterface
{
    public function validateLogin($email, $password);
    public function validateRegistration($user);
    public function register($user);
    
}
?>
