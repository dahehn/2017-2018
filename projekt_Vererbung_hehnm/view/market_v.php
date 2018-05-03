<?php
function printTable()
{
    $product_con = new Product_con();
    $products = $product_con->getAll();
    echo '<table>';
    echo'<th>Name</th><th>Amount in stock</th><th>Price</th><th>Age restriction</th><th>Select</th>';
    foreach ($products as $product)
    {
        echo '<tr>
                    <td>'.$product->getName().'</td>
                    <td>'.$product->getAmount().'</td>
                    <td>'.$product->getPrice().'</td><td>'.$product->getAgeRestriction().'</td>
                    <td><input type="radio" name="select" value="'. $product->getName() .'"></td>
                    </tr>';
    }
    echo '</<table><br>';
}
?>
<html>

<body>
<h1>Hello <?php echo $_SESSION['loggedIn']->getUsername(); ?></h1>
<h2>Manage your account:</h2>
<form method="post">
    <?php if( $_SESSION['loggedIn'] instanceof Supplier)
    {
        echo'<input type="submit" name="add" value="Add products"><br>';
    }
    ?>
    <input type="submit" name="newPassword" value="Change Password">
    <input type="submit" name="logout" value="Logout">
    <input type="submit" name="delete" value="Delete your account">
</form>



<form method="post">
    How many do you want:<input type="text" name="Amount"><br>
    <input type="submit" name="Buy" value="Buy"><br>
    <?php
    printTable();
    echo $message;
    ?>
</form>
</body>

</html>
