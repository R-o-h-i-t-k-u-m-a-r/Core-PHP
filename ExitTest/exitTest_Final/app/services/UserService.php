<?php

require_once 'app/repositories/UserRepositoryInterface.php';
require_once 'app/dao/MySQLiUserRepository.php';

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new MySQLiUserRepository();
    }

    public function validateLogin($email, $password)
    {
        return $this->userRepository->validateLogin($email, $password);
    }

    public function validateRegistration($user)
    {
        return $this->userRepository->validateRegistration($user);
    }

    public function register($user)
    {
        return $this->userRepository->register($user);
    }
}
?>
