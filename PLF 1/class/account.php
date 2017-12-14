<?php
/**
 * Created by PhpStorm.
 * User: Wörk
 * Date: 14.12.2017
 * Time: 11:50
 */

class account
{
    private $owner;
    private $type;
    private $runtime;
    private $description;
    private $year;


    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        if($owner == '')
            return false;
        $this->owner = $owner;
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
     * @param mixed $type
     */
    public function setType($type)
    {
        if($type !='G' || $type !='S' || $type =! 'K' || $type != 'D')
            return false;
        $this->type = $type;
        return true;
    }

    /**
     * @return mixed
     */
    public function getRuntime()
    {
        return $this->runtime;
    }

    /**
     * @param mixed $runtime
     */
    public function setRuntime($runtime)
    {
        if($runtime<0)
            return false;
        $this->runtime = $runtime;
        return true;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        if($year<2000 || $year > 2017)
            return false;
        $this->year = $year;
        return true;
    }


}