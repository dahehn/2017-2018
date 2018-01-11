<?php
if(!isset($_SESSION['products']))
{
    $products = [];
    $_SESSION['products'] = $products;
}
require_once 'views/list_view.php';