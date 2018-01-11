<?php
function print_table($products)
{
    if(count($products)>0)
    {
        echo '<table border="1">';
        echo '<th>Name</th> <th>Price</th> <th>Amount</th> <th>Select</th>';
        foreach ($products as $product)
        {
            echo '<tr><td>'. $product->getName().'</td><td>'.$product->getPrice().'</td><td>'. $product->getAmount().'</td><td><input type="radio" name="select" value="'. $product->getName() .'"></td></tr>';
        }
        echo '</table>';
        echo '<input type="submit" name="delete" value="Remove Account">';
    }
}
?>
<html>
<form>
    <?php print_table()?>
</form>
</html>
