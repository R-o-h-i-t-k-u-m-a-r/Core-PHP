<?php

class User {
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    private $password;

    public function __construct($firstName, $lastName, $email, $phone, $password) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail(){
        return $this->email;
    }
    
    public function getPhone()
    {
        return $this->phone;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
?>
