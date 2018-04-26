<?php
/**
 * Created by PhpStorm.
 * User: Wörk
 * Date: 17.04.2018
 * Time: 09:53
 */

class User_con extends PDOC
{
    //get all user
    public function getAll()
    {
        $users = [];

        $pdo = $this->connect();
        //select needed information
        $sql = $pdo->prepare('select * from user');
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        while (($row = $sql->fetch()) != null)
        {
            if($row['userType'] == 'S')
                $user = new Supplier(row['password'],$row['username'],$row['companyName'],$row['address']);
            else
                $user = new Customer($row['password'],$row['username'],$row['age'],$row['email']);
            $users[$user->getUsername()] = $user;
        }
        return $users;
    }

    //insert users
    public function insert($username,$password,$age,$email,$address,$companyName,$userType)
    {
        try
        {
            $pdo = $this->connect();
            $pdo -> beginTransaction();
            $sql = $pdo -> prepare('insert into user values (?,?,?,?,?,?,?)');
            $sql->bindParam(1,$username);
            $sql->bindParam(2,$password);
            $sql->bindParam(3,$age);
            $sql->bindParam(4,$email);
            $sql->bindParam(5,$address);
            $sql->bindParam(6,$companyName);
            $sql->bindParam(7,$userType);
            $sql->execute();
            $pdo->commit();
        }
        catch (PDOException $e) #catch PDO ex separately
        {
            if(isset($pdo))
                $pdo->rollBack(); #rollback the transaction

            throw $e;
        }
        catch (Exception $e)
        {
            if(isset($pdo))
                $pdo->rollBack(); #rollback the transaction

            throw $e;
        }
        finally
        {
            #close the db connection
            $pdo = null;
        }
    }

    //Check if user exists
    public function exists($username)
    {
        $pdo = $this->connect();
        $sql = $pdo->prepare('select * from user WHERE username = ?');
        $sql->bindParam(1,$username);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        if(($row = $sql->fetch()) != null)
        {
            if ($row['userType'] == 'S')
                $user = new Supplier($row['password'],$row['username'],$row['companyName'],$row['address']);
            else
                $user = new Customer($row['password'],$row['username'],$row['age'],$row['email']);

            return $user;
        }
        return false;
    }

    //remove user
    public function delete($user)
    {
        try
        {
            $pdo = $this->connect();
            $pdo->beginTransaction();
            $sql = $pdo->prepare('delete from users where name = ?');

            $name=$user->getName();
            $sql->bindParam(1, $name);

            $sql->execute();
            $pdo->commit();
            return true;
        }
        catch (PDOException $e)
        {
            if(isset($pdo))
                $pdo->rollBack();

            throw $e;
        }
        catch (Exception $e)
        {
            if(isset($pdo))
                $pdo->rollBack();

            throw $e;
        }
        finally
        {
            $pdo = null;
        }
    }
}