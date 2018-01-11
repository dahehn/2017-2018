<?php
if(!isset($_SESSION['products']))
{
    $products = [];
    $_SESSION['products'] = $products;
}
$products =$_SESSION['products'];

require_once 'views/list_view.php';