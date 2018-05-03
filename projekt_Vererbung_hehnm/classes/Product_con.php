<?php
/**
 * Created by PhpStorm.
 * User: Wörk
 * Date: 17.04.2018
 * Time: 09:54
 */

class Product_con extends PDOC
{
    //get all products
    public function getAll()
    {
        $products = [];

        $pdo = $this->connect();

        $sql = $pdo->prepare('select * from products');

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        while (($row = $sql->fetch()) != null )
        {
            $product = new Product($row['name'],$row['price'],$row['amount'],$row['age']);
            $products[$row['name']] = $product;
        }

        return $products;
    }

    //insert product
    public function insert($name,$amount,$price,$age,$supName)
    {
        try
        {
            $pdo = $this->connect();
            $pdo -> beginTransaction();
            $sql = $pdo -> prepare('insert into products values (?,?,?,?,?)');
            $sql->bindParam(1,$name);
            $sql->bindParam(2,$amount);
            $sql->bindParam(3,$price);
            $sql->bindParam(4,$age);
            $sql->bindParam(5,$supName);
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


    //update product amount
    public function updateAmount($product)
    {
        #!!
        try
        {
            $pdo = $this->connect();

            #when changing data base content we begin a transaction
            $pdo->beginTransaction();

            $sql = $pdo->prepare('update products set amount = ? where name = ?');
            #wenn mitgabewerte der Funktion als werte inserted werden, müssen sie
            #nachträglich übergeben werden
            $amount = $product->getAmount();
            $name = $product->getName();
            $sql->bindParam(1, $amount);
            $sql->bindParam(2, $name);

            $sql->execute();

            #when finished, commit the transaction
            $pdo->commit();
            return true;
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

    //update product price
    public function updatePrice($product)
    {
        #!!
        try
        {
            $pdo = $this->connect();

            #when changing data base content we begin a transaction
            $pdo->beginTransaction();

            $sql = $pdo->prepare('update products set price = ? where name = ?');
            #wenn mitgabewerte der Funktion als werte inserted werden, müssen sie
            #nachträglich übergeben werden
            $price = $product -> getPrice();
            $name = $product->getName();
            $sql->bindParam(1, $price);
            $sql->bindParam(2, $name);

            $sql->execute();

            #when finished, commit the transaction
            $pdo->commit();
            return true;
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

    //delete a product
    public function delete($product)
    {
        try
        {
            $pdo = $this->connect();
            $pdo->beginTransaction();
            $sql = $pdo->prepare('delete from products where name = ?');

            $name=$product->getName();
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