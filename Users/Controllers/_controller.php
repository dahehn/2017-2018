<?php
$message = '';

if(!isset($_SESSION['users']))
{
    $users = [];
    $_SESSION['users'] = $users;
}

$users = & $_SESSION['users'];



if(isset($_POST['log']))
{
    $count = 0;
    if(isset($_POST['uName']) && array_key_exists($_POST['uName'],$users))
    {
        $user = &$users[$_POST['uName']];
        if ($user -> CheckCredentials($_POST['passwd'],$_POST['uName']))
        {
            $userType = '';
            if($user->getUserType() == 'A')
            {
                $userType = 'Admin';
                $count = 1;
            }
            elseif($user->getUserType() == 'U')
                $userType = 'User';
            else
                $userType = 'Guest';
            $message ='Welcome'.$user->getUsername() . $userType . $user -> getEmail();
            $loggedInUser = $user->getUsername();
            require_once 'Views/logedin_view.php';
            return;
        }
    }

}

if(isset($_POST['register']))
{
    require_once 'Views/register_view.php';
    return;
}

if(isset($_POST['finish']))
{
    $user = new User();

    if(!$user ->setEmail($_POST['e-mail']))
    {
        $message = 'Invalid E-mail';
        require_once 'Views/register_view.php';
        return;
    }

    elseif (!$user->setPassword($_POST['password']))
    {
        $message = 'Invalid password';
        require_once 'Views/register_view.php';
        return;
    }

    elseif (!$user->setUsername($_POST['username']))
    {
        $message = 'Username is empty';
        require_once 'Views/register_view.php';
        return;
    }

    else
    {
        $user -> setUserType($_POST['userType']);
        if($user->getUserType()=='A')
            $count = 1;
        $users[$user -> getUsername()] = $user;
        $user -> LoggeIn();
        $message = 'Welcome:' . $user -> getUsername() . 'Your Usertype:' . $user -> getUserType() . 'Your E-mail:' . $user -> getEmail();
        require_once 'Views/logedin_view.php';
        return;
    }
}

if(isset($_POST['logout']))
{
    foreach ($users as $user)
    {
        $user->loggeOut();
    }
    require_once 'Views/login_view.php';
    return;
}

if(isset($_POST['delete']))
{
    if(isset($_POST['select']))
    {
        unset($users[$_POST['select']]);
    }

}
if(count($users) > 0) {
    require_once 'Views/login_view.php';
}
else
    require_once 'Views/register_view.php';