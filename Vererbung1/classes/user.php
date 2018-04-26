<?php

class user
{
    //fields
    private $username;
    private $userType;
    private $password;
    private $email;

   //ctor
    public function __construct($username, $userType,$password, $email)
    {

        $this->setUsername($username);
        $this->setUserType($userType);
        $this->setPassword($password);
        $this->setEmail($email);
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username)
    {
        if ($username == '')
        {
            return false;
        }
        $this->username = $username;
        return true;
    }


    public function getUserType()
    {
        return $this->userType;
    }


    public function setUserType($userType)
    {
        $this->userType = $userType;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        if(strlen($password) <8)
            return false;

        $this->password = $password;
        return true;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        if(strpos($email,'@')==false || strlen($email)<2)
            return false;
        $this->email = $email;
        return true;
    }

    //Custom methods

    public function CheckCredentials($password,$username)
    {
        if($this->getPassword() == $password && $this->getUsername() == $username)
        {
            return true;
        }

        else
        {
            return false;
        }
    }


}