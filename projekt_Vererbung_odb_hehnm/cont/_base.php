<?php

//standarts
if(!isset($_SESSION['users']))
{
    $users = [];
    $_SESSION['users'] = $users;

    if(!isset($_SESSION['products']))
    {
        $products=[];
        $_SESSION['products']=$products;
    }
}
$products =& $_SESSION['products'];
$users =& $_SESSION['users'];


//supplier
if(isset($_POST['f']))
{
    require_once 'view/add_view.php';
    return;
}

//add product
if(isset($_POST['addP']))
{
    if(array_key_exists($_POST['newName'],$products))
    {
        $message='Product already exists';
        require_once 'view/add_view.php';
        return;
    }
    try{
        $product = new Product($_POST["pn"],$_POST['price'],$_POST['amount'],$_POST['aRestr']);
        $products[$product ->getName()] = $product;
        require_once 'view/add_view.php';
        $message = 'Product successfully added';
        return;
    }
   catch (Exception $exception)
   {
       $message = $exception->getMessage();
   }
}

//registration views
if(isset($_POST['register']))
{
    require_once 'view/role_view.php';
    return;
}

//select registration view
if(isset($_POST['role']))
{
    if($_POST['userType'] == 'C')
    {
        require_once 'view/register_view.php';
        return;
    }
    if($_POST['userType']=='S')
    {
        require_once 'view/supplier_view.php';
        return;
    }

    if($_POST['userType'] == 'G')
    {
        require_once 'view/market_v.php';
        return;
    }
}


require_once 'view\loggin_v.php';
return;