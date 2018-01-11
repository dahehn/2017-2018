<?php

if (isset($_GET['login']))
{
    require_once 'views/create_view.php';
    return;
}
if(isset($_GET['register']))
{
    require_once 'views/login.php';
    return;
}
require_once 'views/welcome.php';


