<?php

if(!isset ($_SESSION['users']))
{
    $users = [];
    $_SESSION['users'] = $users;
    if (!isset($_SESSION['goods']))
    {
        $goods = [];
        $_SESSION['goods'] = $goods;
    }
}

$users =& $_SESSION['users'];
$goods =& $_SESSION['goods'];


