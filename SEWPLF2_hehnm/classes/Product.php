<?php

class Product
{
    //fields
    private $name;
    private $price;
    private $amount;

    //ctor

    public function __construct($name, $price, $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

   //properties
    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function getAmount()
    {
        return $this->amount;
    }


    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    //methods
    public function getValue()
    {
        $money = $this->price*$this->amount;
        return $money;
    }
}