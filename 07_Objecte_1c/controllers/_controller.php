<?php

$message;
if(!isset($_SESSION['users']))
{
    $users = [];
    $_SESSION['users'] = $users;
}

$users = & $_SESSION['users'];

if(isset($_POST['create']))
{
    require_once 'Views/create_view.php';
    return;
}

if(isset($_POST['login']))
{
    if(isset($_POST['username']) && array_key_exists($_POST['username'],$users))
    {
        $user =& $users['username'];
        if($user -> Check($_POST['username'],$_POST['password']))
        {
            require_once 'Views/loggedIn_view.php';
            return;
        }
    }
}

if (isset($_POST['finish']))
{
    $user = new user();
    if (!$user -> getUsername($_POST['uName']))
    {
        $message = 'Username is empty ,';
        if(!$user -> setPassword($_POST['passwd']))
        {
            $message .= 'Password is shorter than 8 characters';
        }
        require_once 'Views/create_view.php';
        return;
    }
    elseif (!$user -> setPassword($_POST['passwd']))
    {
        $message = 'Password is shorter than 8 characters ,';
        if(!$user -> setUsername($_POST['uName']))
        {
            $message .= 'Username is empty ';
        }
        require_once 'Views/create_view.php';
        return;
    }
    else
    {
        $message = 'Welcome' .'    '. $user -> getUsername();
        require_once 'Views/loggedIn_view.php';
        return;
    }
}
