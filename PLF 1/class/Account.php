<?php
/**
 * Created by PhpStorm.
 * User: Wörk
 * Date: 14.12.2017
 * Time: 10:49
 */

class Account
{

//fields
private $type;
private $owner;
private $description;
private $year;
private $runtime;

    /**
     * @param mixed $type
     */
    public function setType($type)
    {

        $this->type = $type;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
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
        $this->year = $year;
    }

    /**
     * @param mixed $runtime
     */
    public function setRuntime($runtime)
    {
        $this->runtime = $runtime;
    }

//ctor

//properties

//methods


}