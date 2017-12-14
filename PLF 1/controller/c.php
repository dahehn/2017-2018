<?php


if(!isset($_POST['save']))
{
    if ($Account->setOwner($_POST['owner']) && $Account->setRuntime($_POST['runtime']) && $Account->setYear($_POST['year'])){

    }



}