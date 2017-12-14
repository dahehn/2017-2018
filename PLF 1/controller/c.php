<?php

if(!isset($_SESSION['account']))
{
    $_SESSION['account'] = new account();
}
if(!isset($_POST['save']))
{
    if ($Account->setOwner($_POST['owner']) && $Account->setRuntime($_POST['runtime']) && $Account->setYear($_POST['year'])){

    }



}