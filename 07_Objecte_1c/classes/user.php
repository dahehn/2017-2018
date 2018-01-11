<?php

class user
{
    //fields
    private $username;
    private $password;


    //properties
    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username)
    {
        if($username != '')
        {
            $this->username = $username;
            return true;
        }
       return false;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        if(strlen($password) >= 8) {
            $this->password = $password;
            return true;
        }
        return false;
    }

    //methods
    public function Check($username,$password)
    {
        if($this->getUsername() == $username && $this->getPassword() == $password)
            return true;
        return false;
    }
}