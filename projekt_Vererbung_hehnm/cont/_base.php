<?php

//standards
$message ='';
//user container
if(!isset($_SESSION['userCon']))
{
    try
    {
        $userCon = new User_con();
        $_SESSION['userCon'] = $userCon;
    }
    catch (Exception $exception)
    {
        $message = $exception->getMessage();
    }
}
$userCon =& $_SESSION['userCon'];

//product container
if (!isset($_SESSION['productCon']))
{
    try
    {
        $productCon = new Product_con();
        $_SESSION['productCon'] = $productCon;
    }
    catch (Exception $exception)
    {
        $message = $exception->getMessage();
    }
}
$productCon =& $_SESSION['productCon'];

//get all products from database
if(!isset($_SESSION['products']))
{
    $products = $productCon->getAll();
    $_SESSION['products']=$products;
}

//switch to selection
if(isset($_POST['register']))
{
    require_once 'view/role_view.php';
    return;
}

//choose register view
if(isset($_POST['role']))
{
    if($_POST['userType'] == 'C')
    {
        require_once 'view/customer_register_view.php';
        return;
    }
    if($_POST['userType']=='S') {
        require_once 'view/supplier_view.php';
        return;
    }

    if($_POST['userType'] == 'G')
    {
        require_once 'view/market_v.php';
        return;
    }
}

//add customer + insert
if(isset($_POST['cFinish']))
{
    if ($userCon->exists($_POST['cUsername']))
    {
        $message = 'Username already exists';
        require_once 'view/loggin_v.php';
        return;
    }
    try
    {
        $address = '';
        $companyName = '';
        $user = new Customer($_POST['cPassword'],$_POST['cUsername'],$_POST['cAge'],$_POST['cEmail']);
        $userCon->insert($_POST['cUsername'],$_POST['cPassword'],$_POST['cAge'],$_POST['cEmail'],$address,$companyName,'C');
        $_SESSION['loggedIn'] = $user;

    }
    catch (Exception $exception)
    {
        $message = $exception->getMessage();
        require_once 'view/customer_register_view.php';
        return;
    }

}

//add supplier + insert
if(isset($_POST['f']))
{
    $user ;
    try
    {
        if ($userCon->exists($_POST['un']))
        {
            $message = 'Username already exists';
            require_once 'view/supplier_view.php';
            return;
        }

        $user = new Supplier($_POST['pw'],$_POST['un'],$_POST['cn'],$_POST['address']);
        $_SESSION['loggedIn'] = $user;
        $age = 0 ;
        $email = '';

        $userCon->insert($user->getUsername(),$user->getPassword(),$age,$email,$user->getAddress(),$user->getCompanyName(),'S');
        require_once 'view/market_v.php';
        return;
    }
    catch (Exception $exception)
    {
        $message = $exception->getMessage();
    }
}

//add product
if(isset($_POST['add']))
{
    require_once 'view/add_view.php';
    return;
}

if(isset($_POST['addP']))
{
    try
    {
        if($_POST['pName'] == '' || $_POST['pAmount'] == '' || $_POST['pPrice'] == '')
        {
            $message = 'Name,amount or price missing';
            require_once 'view/add_view.php';
            return;
        }
        else
        {
            if(array_key_exists($_POST['pName'],$products) && is_int($_POST['pPrice']))
            {
                $amount = $products['pName']->getAmount() + $_POST['pAmount'];
                $products['pName']->setAmount($amount);
                $productCon->updateAmount($products['pName']);
            }
            $age = '';
            if($_POST['pAge'] == '')
                $age = 0;
            else
                $age = $_POST['pAge'];
            $product = new Product($_POST['pName'],$_POST['pPrice'],$_POST['pAmount'],$age);

        }
    }
    catch (Exception $exception)
    {
        $message = $exception->getMessage();
    }
}

//user login
if(isset($_POST['login']))
{
    if ($_POST['loginU'] == '')
    {
        $message = 'Empty username';
        require_once 'view/loggin_v.php';
        return;
    }

    if ($userCon->exists($_POST['loginU']))
    {
        $user = $userCon->exists($_POST['loginU']);
        if ($user->login($_POST['loginU'], $_POST['loginP']))
        {
            require_once 'view/market_v.php';
            return;
        }

        $message = 'Password does not match username';
        require_once 'views/loggin_v.php';
        exit;
    }
    $message = 'No such user registered';
}

require_once 'view\loggin_v.php';
return;