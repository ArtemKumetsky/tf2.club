<?php
session_start();

if (isset($_POST['trade_url'])) {
    $_SESSION['trade_url'] = $_POST['trade_url'];
    setcookie("trade_url", $_POST['trade_url'], time() + (10 * 365 * 24 * 60 * 60), "/");
    $_SESSION['action_status'] = 'success';

    $_SESSION['card_info'] = $_POST['card_info'];
    setcookie("card_info", $_POST['card_info'], time() + (10 * 365 * 24 * 60 * 60), "/");
    $_SESSION['action_status'] = 'success';

    $_SESSION['qiwi_info'] = $_POST['qiwi_info'];
    setcookie("qiwi_info", $_POST['qiwi_info'], time() + (10 * 365 * 24 * 60 * 60), "/");
    $_SESSION['action_status'] = 'success';

    $_SESSION['lang_info'] = $_POST['lang_info'];
    setcookie("lang_info", $_POST['lang_info'], time() + (10 * 365 * 24 * 60 * 60), "/");
    $_SESSION['action_status'] = 'success';

    require '../User.php';
    User::updateTradeUrl($_SESSION['trade_url'], $_SESSION['steam_steamid'], $_SESSION['card_info'], $_SESSION['qiwi_info']);
}

header('location: /');

