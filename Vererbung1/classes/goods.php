<?php
class goods
{

//fields
private $goodId;
private $goodName;


//ctor
    public function __construct($goodId,$goodName)
    {
            $this->goodId = $goodId;
            $this->goodName = $goodName;
    }

   //setter

    public function setGoodId($goodId)
    {
        $this->goodId = $goodId;
    }


    public function setGoodName($goodName)
    {
        $this->goodName = $goodName;
    }



}


