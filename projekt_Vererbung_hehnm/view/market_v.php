<?php
function printTable()
{
    $product_con = new Product_con();
    $products = $product_con->getAll();
    echo '<table>';
    echo'<th>Name</th><th>Amount in stock</th><th>Price</th><th>Age restriction</th><th>Selected</th>';
    foreach ($products as $product)
    {
        echo '<tr>
                    <td>'.$product->getName().'</td>
                    <td>'.$product->getAmount().'</td>
                    <td>'.$product->getPrice().'</td><td>'.$product->getAgeRestriction().'</td>
                    <td><input type="radio" name="select" value="'.$product->getProductId().'"</td>
                    </tr>';
    }
    echo '</<table>';
}
?>
<html>
<h1>Hello</h1>
<?php
printTable();
if( $_SESSION['loggedIn'] instanceof Supplier)
{
    echo'<input type="submit" name="add" value="Add products">';
}
?>
</html>
