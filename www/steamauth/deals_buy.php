<?php
session_start();

if (isset($_POST['trade_url']) && isset($_POST['buy_keys_numb'])) {
    $_SESSION['trade_url'] = $_POST['trade_url'];
    $_SESSION['keys_numb'] = $_POST['buy_keys_numb'];
    $_SESSION['card_info'] = $_POST['card_info'];
    $_SESSION['qiwi_info'] = $_POST['qiwi_info'];
    $_SESSION['total_price'] = $_POST['total_price'];


    require "../db.php";
    require '../Deals_B.php';
    Deals_B::addUser([
        "keys" => $_SESSION['keys_numb'],
        "trade_url" => $_SESSION['trade_url'],
        "steam_id" => $_SESSION['steam_steamid'],
        "card" => $_SESSION['card_info'],
        "qiwi" => $_SESSION['qiwi_info'],
        "payment" => $_SESSION['total_price']

    ]);

}
header('location: /');
exit;