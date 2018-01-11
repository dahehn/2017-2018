<?php
if(!isset($_SESSION['accounts']))
{
    $accounts=[];
    $_SESSION['accounts']=$accounts;
    require_once 'views/login.php';
    return;
}


if(isset($_POST['Submit']))
{

}