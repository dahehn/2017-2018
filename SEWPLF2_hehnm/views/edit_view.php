<?php
function print_textBox($name,$value)
{
    echo '<input type="text" name="' . $name . '" value="' . $value . '"/>';
}
?>
<html>
<body>
<h1>Product:</h1>

<form method="post">
    Name<?php echo '<input type="text" value="'.$product->getName().'" name="id" disabled '?>
    <br>
    <br>
    Price<?php echo'<input type="text" value="'.$product->getPrice().'" name="chnaged"'?>
    <br>
    <input type="submit" name="save" value="Save">
    <input type="submit" name="cancel" value="Cancel">'

</form>

</body>
</html>