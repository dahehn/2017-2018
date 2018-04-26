<html>
<body>
<h1>Product:</h1>
<?php echo $message?>
<form method="post">
    <br>
    Name:<input type="text" name="newName">
    <br>
    Price:<input type="text" name="newPrice"><br>

    Amount:<input type="text" name="newAmount">
    <br>
    <input type="submit" name="save" value="Save">
    <input type="submit" name="cancel" value="Cancel">
</form>

</body>
</html>