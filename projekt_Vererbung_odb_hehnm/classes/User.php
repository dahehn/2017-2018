<?php

class User
{
//fields
private $password;
private $username;
private $userType;

   //ctor
    public function __construct($password, $username,$userType)
    {
       $this->setPassword($password);
        $this->username = $username;
        $this->userType = $userType;
    }


    public function setPassword($password): void
    {
        if(strlen($password)>8 && strlen($password)<16 && strpbrk($password,'1234567890'))
        $this->password = $password;
        throw new Exception('Invalid password');
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }
}
