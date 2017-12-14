<?php
$login=true;
if($login==true)
    require_once 'view/account_view.php';

if(!isset($_SESSION['account']))
{
    $_SESSION['account'] = new account();
}
$Account = $_SESSION['account'];
if(!isset($_POST['save']))
{
    if($Account->setOwner($_POST['owner']))
        return;
}