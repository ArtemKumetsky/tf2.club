<?php

require_once "modules/SQL_connect.php";

$B_prices = (new Buy())->fetch();
$S_prices = (new Sell())->fetch();



