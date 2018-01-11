<?php
$message;
if(!isset($_SESSION['products']))
{
    $products = [];
    $_SESSION['products'] = $products;
}
$products =$_SESSION['products'];
if(isset($_POST['new']))
{
    require_once 'views/new_view..php';
    return;
}
if(isset($_POST['delete']))
{
    if (isset($_POST['select']))
    {
            $id = $_POST['select'];
            $gift = $products[$id];
            $title = "Change the gift:";
            require_once 'views/new_view.php';
            return;
    }
}
if(isset($_POST['save']))
{
    if(array_key_exists($_POST['newName'],$products))
    {
        $message='Product already exists';
        return;
    }

}
require_once 'views/list_view.php';