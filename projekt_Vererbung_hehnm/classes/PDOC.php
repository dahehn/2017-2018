<?php
/**
 * Created by PhpStorm.
 * User: Wörk
 * Date: 17.04.2018
 * Time: 11:39
 */

class PDOC
{
    public function connect(string $dsn = 'mysql:dbname=project;host=localhost', // the data source name (DSN) --> where to find the database (connection string)
                            string $username = 'root',  // the database user
                            string $password = '',      // the password of the database user

                            array $pdoAttributes =
                            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // throws PDOExceptions if any errors occurs
                                PDO::ATTR_PERSISTENT => true // true = after executing the script
                            ]                                                // the connection to the db remains
        // and wil be reused
    ): PDO
    {
        return new PDO ($dsn, $username, $password, $pdoAttributes);
    }
}