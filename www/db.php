<?php

class db
{
    protected static $address = "ek420839.mysql.tools";
    protected static $username = "ek420839_shop";
    protected static $password = "Sas12ttt";
    protected static $database = "ek420839_shop";

//    protected static $address = "localhost";
//    protected static $username = "root";
//    protected static $password = "";
//    protected static $database = "shop";

    public static function connect()
    {
        $conn = new mysqli(self::$address, self::$username, self::$password, self::$database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public static function sort($result)
    {
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        return $items;
    }
}


