<?php
$message='';
$fin=false;
if($fin=false)
{
    require_once 'view/account_view.php';
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
        if($Account->setYear($_POST['year']) && $Account->setRuntime($_POST['runtime']) && $Account->setOwner($_Post['owner']) )
        {
            $fin = true;
            return $fin;
        }
    }
}
else
    require_once 'view/transaction_view.php';
