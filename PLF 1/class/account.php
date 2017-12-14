<?php
/**
 * Created by PhpStorm.
 * User: Wörk
 * Date: 11.12.2017
 * Time: 11:52
 */

class user
{
private $username;
private $password;
private $mail;
private $userType;
private $loggedIn;


    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username)
    {
        if($username=='')
        {
            return false;
        }
        $this->username = $username;
        return true;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        if(strlen($password)< 8)
            return false;
        $this->password = $password;
        return true;
    }


        public function getMail()
    {
        return $this->mail;
    }


    public function setMail($mail)
    {
        if ($mail=='')
            return false;
        $this->mail = $mail;
        return true;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }


    public function setUserType($userType)
    {
        if($userType !='A'||$userType !='G'||$userType!='U')
            return false;
        $this->userType = $userType;
        return true;
    }

    /**
     * @return mixed
     */
    public function getLoggedIn()
    {
        return $this->loggedIn;
    }

    /**
     * @param mixed $loggedIn
     */
    public function setLoggedIn($loggedIn)
    {
        $this->loggedIn = $loggedIn;
    }

    public function checkCr($username,$password)
    {
        if($this->getUsername()=='' || $this->getPassword()=='')
        {
            return false;
        }
    if($username==$this->getUsername()&&$password==$this->getPassword())
        return true;
    return false;
    }
    public  function login()
    {
        $this->setLoggedIn(true);
    }
    public  function logout()
    {
        $this->setLoggedIn(false);
    }
    public function isLoggedIn()
    {
        if ($this->getLoggedIn()==true)
            return true;
        return false;
    }
}