<?php

class Account
{
//fields

private $type;
private $owner;
private $description;
private $year;
private $runtime;

//getters

    public function getType()
    {
        return $this->type;
    }

    public function getOwner()
    {
        return $this->owner;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function getYear()
    {
        return $this->year;
    }


    public function getRuntime()
    {
        return $this->runtime;
    }

//setters

    public function setType($type)
    {
        if($type != 'Girokonto' || $type != 'Sparkonto' || $type != 'Kreditkonto' || $type != 'Depot')
            return false;
        $this->type = $type;
        return true;
    }

    public function setOwner($owner)
    {
        if($owner == '')
            return false;
        $this->owner = $owner;
        return true;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function setYear($year)
    {
        if($year >= 2000 && $year <= 2017) {
            $this->year = $year;
            return true;
        }
        return false;
    }

    public function setRuntime($runtime)
    {if ($runtime < 0)
        return false;

     $this->runtime = $runtime;
     return true;
    }
}