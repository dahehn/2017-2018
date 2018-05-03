<?php


class Supplier extends User
{
private $companyName;
private $address;


    public function __construct($password, $username,$companyName,$address)
    {
        parent::__construct($password,$username);
        $this->setCompanyName($companyName);
        $this->address = $address;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function setCompanyName($companyName)
    {
        if($companyName == true)
        {
            $companyName='private';
            $this->companyName = $companyName;
        }
        if($companyName == '')
            throw new Exception('Enter a Name for your Company');
        $this->companyName = $companyName;
    }


    public function getAddress()
    {
        return $this->address;
    }


    public function setAddress($address)
    {
        $this->address = $address;
    }
}

