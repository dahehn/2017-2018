<?php
/**
 * Created by PhpStorm.
 * User: Wörk
 * Date: 05.01.2018
 * Time: 10:08
 */

class User
{
    //fields
    private $username;
    private $userType;
    private $loggedIn;
    private $password;
    private $email;


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


    public function getLoggedIn()
    {
        return $this->loggedIn;
    }


    public function setLoggedIn($loggedIn)
    {
        $this->loggedIn = $loggedIn;
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

    public  function LoggeIn()
    {
        $this->setLoggedIn(true);
    }

    public function LoggeOut()
    {
        $this->setLoggedIn(false);
    }

    public function IsLoggedIn()
    {
        if($this->getLoggedIn()== true)
            return true;
        return false;
    }
}