<?php
if(!isset($_SESSION['products']))
{
    $products = [];
    $_SESSION['products'] = $products;
}
$products =$_SESSION['products'];
if(isset($_POST['new']))
{
    require_once 'views/new_view.php';
    return;
}

require_once 'views/list_view.php';