<?php

class Account
{

//fields
private $type;
private $owner;
private $description;
private $year;
private $runtime;

    /**
     * Account constructor.
     */
    public function __construct()
    {
    }
    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        if($type != 'Girokonto'|| $type != 'Sparkonto' || $type != 'Kreditkonto' || $type != 'Depot')
            return false;
        $this->type = $type;
        return true;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        if($owner =='')
            return false;
        $this->owner = $owner;
        return true;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {

        $this->description = $description;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        if ($year >2000 || $year < 2017)
            return false;
        $this->year = $year;
        return true;
    }

    /**
     * @param mixed $runtime
     */
    public function setRuntime($runtime)
    {
        if($runtime <0)
            return false;
        $this->runtime = $runtime;
        return true;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getRuntime()
    {
        return $this->runtime;
    }





}