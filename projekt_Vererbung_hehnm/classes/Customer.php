<?php

class Customer extends User
{
//fields
private $email;
private $age;


//ctor

    /**
     * Customer constructor.
     * @param $password
     * @param $username
     * @param $age
     * @param $email
     * @throws Exception
     */
    public function __construct($password, $username, $age,$email)
{
    parent::__construct($password,$username);
    $this->setAge($age);
    $this->setEmail($email);
}

    public function setEmail($email): void
    {
        if(strpos($email,'@') == false || strlen($email) < 2)
            throw new Exception('Invalid Email');
        $this->email = $email;
    }

    public function setAge($age): void
    {
        if(!ctype_digit($age))
            throw new Exception('Invalid input');
        $this->age = $age;

    }
//methods

}