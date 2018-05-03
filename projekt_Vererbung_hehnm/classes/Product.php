<?php
/**
 * Created by PhpStorm.
 * User: Wörk
 * Date: 02.04.2018
 * Time: 14:36
 */

class Product
{

private $name;
private $price;
private $amount;
private $ageRestriction;


    public function __construct($name, $price, $amount, $ageRestriction)
    {
        $this->setAgeRestriction($ageRestriction);
        $this->setName($name);
       $this->setAmount($amount);
       $this->setPrice($price);
    }


    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }


    public function setAgeRestriction($ageRestriction): void
    {
        $this->ageRestriction = $ageRestriction;
    }


    public function setName($name): void
    {
        if($name == '')
            throw new Exception('Name can not be empty');
        $this->name = $name;
    }


    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getAgeRestriction()
    {
        return $this->ageRestriction;
    }

}