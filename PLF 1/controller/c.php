<?php
$message='';
$fin=false;
$c=0;
if(!0)
    $fin=true;
if($fin==false)
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
            return;
        }
    }
}
else
    require_once'view/transactoin_view.php';
