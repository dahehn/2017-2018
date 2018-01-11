<html>
<body>
<h1>Product:</h1>
<form method="post">
    Name<input type="text" name="newName">
    <br>
    Price<input type="text" name="newPrice">
    <br>
    Amount<input type="text" name="newAmount">
    <br>
    <input type="submit" name="save" value="Save">
    <input type="submit" name="cancel" value="Cancel">
</form>
<?php echo $message?>
</body>
</html>