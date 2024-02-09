<?php
session_start();

if (isset($_POST['keys_numb'])) {
    $_SESSION['type'] = $_POST['type'];
    $_SESSION['keys_numb'] = $_POST['keys_numb'];
    $_SESSION['payment_info'] = $_POST['payment_info'];
    $_SESSION['total_price'] = $_POST['total_price'];
    $_SESSION['card_info'] = $_POST['card_info'];
    $_SESSION['qiwi_info'] = $_POST['qiwi_info'];
    $_SESSION['trade_url'] = $_POST['trade_url'];


    require "../db.php";
    require '../User_offers.php';
    User_offers::addUser([
        "type" => $_SESSION['type'],
        "keys" => $_SESSION['keys_numb'],
        "steam_id" => $_SESSION['steam_steamid'],
        "payment_info" => $_SESSION['payment_info'],
        "payment" => $_SESSION['total_price'],
        "qiwi_info" => $_SESSION['qiwi_info'],
        "card_info" => $_SESSION['card_info'],
        "trade_url" => $_SESSION['trade_url']
    ]);

}
exit;
