<?php

namespace app\database;

use PDO;
use Exception;
use PDOException;

class Connect
{
    private static $pdo = null;


    public static function connect()
    {
        try
        {
            if(!static::$pdo)
            {
                static::$pdo = new PDO("mysql:host=191.243.161.184;dbname=cart","root", "root",[
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
            }


            return static::$pdo;
        }catch(PDOException $e)
        {
            var_dump($e->getMessage());
        }
    }
}
