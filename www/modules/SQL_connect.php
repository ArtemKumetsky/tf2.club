<?php
require_once "db.php";

class Buy
{
    public function fetch()
    {
        $result = db::connect()->query("SELECT * FROM price_buy");
        return db::sort($result);
    }
    public function create() {

    }
}
class Sell
{
    public function fetch()
    {
        $result = db::connect()->query("SELECT * FROM price_sell");
        return db::sort($result);
    }
    public function create() {

    }
}
