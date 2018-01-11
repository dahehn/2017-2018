<?php
function print_table($users)
{
    if(count($users)>0)
    {
        echo '<table border="1">';
        echo '<th>Username</th> <th>email</th> <th>User type</th> <th>Select a User</th>';
        foreach ($users as $user)
        {
            echo '<tr><td>'. $user -> getUsername() .'</td><td>'. $user -> getEmail().'</td><td>'. $user -> getUserType().'</td><td><input type="radio" name="select" value="'. $user -> getUsername() .'"></td></tr>';
        }
        echo '</table>';
        echo '<input type="submit" name="delete" value="Remove Account">';
    }
}
?>
<html>
<h1>
    <?php
    echo 'Welcome:   ' . $user -> getUsername() ;
    ?>
</h1>
<body>
<h3>All users:</h3>

<form method="post">
<p>
    <?php
    if($count = 1)
        print_table($_SESSION['users']);
    ?>
</p>
</form>
<p><?php
    echo $message;
    echo $user -> getUsername();
    ?></p>
<form method="post">
    <input type="submit" name="logout" value="Logout">
</form>
</body>
</html>