<html>
<body>
<form method="post">
    Username: <input type="text" name="username">
    <br>
    Password: <input type="password" name="password">
    <br>
    E-mail: <input type="text" name="e-mail">
    <br>
    UserType: <br>
    Administrator: <input type="radio" name="userType" value="A">
    <br>
    Guest: <input type="radio" name="userType" value="G" checked>
    <br>
    User: <input type="radio" name="userType" value="U">
    <br>
    <input type="submit" value="Finish" name="finish">
    <br>
</form>
<p><?php echo $message ?></p>
</body>
</html>