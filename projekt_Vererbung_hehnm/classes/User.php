<?php

class User
{
//fields
private $password;
private $username;


   //ctor
    public function __construct($password, $username)
    {
       $this->setPassword($password);
       $this->setUsername($username);
    }


    public function setPassword($password): void
    {
        if(strlen($password) < 8 )
            throw new Exception('Invalid password');
        $this->password = $password;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setUsername($username): void
    {
        if($username == '')
            throw new Exception('Enter a username');
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function login($username,$password)
    {
        if ($this->username==$username&&$this->password==$password)
        {
            return true;
        }
        return false;
    }

}
