<?php

//standards
$message ='';
$user=$_SESSION['loggedIn'];
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
        $_SESSION['loggedIn'] = '';
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
        require_once 'view/supplier_view.php';
        return;
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
        $products = $productCon->getAll();
        if($_POST['pName'] == '' || $_POST['pAmount'] == '' || $_POST['pPrice'] == '')
        {
            $message = 'Name,amount or price missing';
            require_once 'view/add_view.php';
            return;
        }
        else
        {
            if(!ctype_digit($_POST['pAmount']) || !is_numeric($_POST['pPrice']))
            {
                $message = 'amount and price are invalid';
                require_once 'view/add_view.php';
                return;
            }
            if($_POST['pAge'] == '')
            {
                $age = 0;
                $product = new Product($_POST['pName'],$_POST['pPrice'],$_POST['pAmount'],$age);
                $productCon->insert($product->getName(),$product->getAmount(),$product->setPrice(),$product->getAgeRestriction(),$user->getCompanyName());
                require_once 'view/market_v.php';
                return;
            }
            if (ctype_digit($_POST['pAge']))
            {
                $product = new Product($_POST['pName'],$_POST['pPrice'],$_POST['pAmount'],$_POST['pAge']);
                $productCon->insert($product->getName(),$product->getAmount(),$product->getPrice(),$product->getAgeRestriction(),$user->getCompanyName());
                require_once 'view/market_v.php';
                return;
            }
        }
    }
    catch (Exception $exception)
    {
        $message = $exception->getMessage();
        require_once 'view/add_view.php';
        return;
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
            $_SESSION['loggedIn'] = $user;
            require_once 'view/market_v.php';
            return;
        }

        $message = 'Password does not match username';
        require_once 'view/loggin_v.php';
        exit;
    }
    $message = 'No such user registered';
}

//Buy
if(isset($_POST['Buy']))
{
    if($_POST['Amount'] == '' || !ctype_digit($_POST['Amount']))
    {
        $message = 'Invalid Amount';
        require_once 'view/market_v.php';
        return;
    }
    if($_POST['select'] == '')
    {
        $message = 'Please select a product';
        require_once 'view/market_v.php';
        return;
    }
    $amount = 0;
    $name = $_POST['select'];
    $products = $productCon->getAll();
    $product = $products[$name];
    $amount = $product->getAmount() - $_POST['Amount'];
    $product->setAmount($amount);
    $productCon->updateAmount($product);
    $message = 'successfully bought';
    require_once 'view/market_v.php';
    return;
}

require_once 'view\loggin_v.php';
return;