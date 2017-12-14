<?php

if(!isset($_SESSION['account']))
{
    $_SESSION['account']= new account();
    require_once 'view/account_view.php';
}
$Account = $_SESSION['account'];
if(!isset($_POST['save']))
{
    if($Account->setOwner($_POST['owner']))
        require_once 'view/transaction_view.php';
}