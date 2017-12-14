<?php
$message='';
if(!isset($_SESSION['account']))
{
    $_SESSION['account'] = new account();
}
else
{
 $message='There is already a account';
 return $message;
}
$Account =&$_SESSION['account'];

if(!isset($_POST['save']))
{
    if($Account->setYear($_POST['year']))
        
}