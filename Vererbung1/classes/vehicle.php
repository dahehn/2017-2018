<?php

class vehicle extends goods
{
//fields
private $colour;
private $ties;
private $engine;
private $price;
private $amount;

  //ctor
    public function __construct($goodId,$goodName,$colour, $ties, $engine,$amount,$price)
    {
        parent::__construct($goodId,$goodName,$colour,$ties,$engine);
        $this->setColour($colour);
        $this->setEngine($engine);
        $this->setTies($ties);
        $this->setAmount($amount);
        $this->setPrice($price);
    }


    public function getColour()
    {
        return $this->colour;
    }


    public function setColour($colour)
    {
        if($colour == '')
            return false;
        $this->colour = $colour;
    }


    public function getTies()
    {
        return $this->ties;
    }


    public function setTies($ties)
    {
        if($ties < 0 || is_int($ties) == false)
            return false;
        $this->ties = $ties;
    }


    public function getEngine()
    {
        return $this->engine;
    }


    public function setEngine($engine)
    {
        if($engine == '')
            $engine = false;
        $this->engine = $engine;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        if($price<=0)
            return false;
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


}