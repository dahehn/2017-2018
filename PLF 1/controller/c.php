<?php
if(!isset($_SESSION['Account']))
{
    $_SESSION['Account']= new  Account();
    require_once 'view/account_view.php';
}
$Account =$_SESSION['Account'];
if(!isset($_POST['save']))
{
    if ($Account->getOwner())
}