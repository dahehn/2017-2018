<?php
$message;

if(!isset($_SESSION['products']))
{
    $products = [];
    $_SESSION['products'] = $products;
}
$products =& $_SESSION['products'];
if(isset($_POST['new']))
{
    $message='';
    require_once 'views/new_view..php';
    return;
}
if(isset($_POST['delete']))
{
    if (isset($_POST['select'])) {
        $id = $_POST['select'];
        unset($products[$id]);
    }
    else {
        $message = 'No gift selected';
    }
}
if(isset($_POST['save']))
{
    if(array_key_exists($_POST['newName'],$products))
    {
        $message='Product already exists';
        require_once 'views/new_view..php';
        return;
    }
    $product = new Product($_POST['newName'],$_POST['newPrice'],$_POST['newAmount']);
    $products[$product -> getName()] = $product;
    require_once 'views/list_view.php';
    return;
}
$money = 0;

$message = 'Warenwert'.$money.'  Anzahl der Produkte';
require_once 'views/list_view.php';