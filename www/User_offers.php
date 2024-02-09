<?php

class User_offers extends DB {

    public static function addUser($data) {
        $type = $data['type'];
        $number = $data['keys'];
        $steam_id = $data['steam_id'];
        $payment_info = $data['payment_info'];
        $payment = $data['payment'];
        $card_info = $data['card_info'];
        $qiwi_info = $data['qiwi_info'];
        $trade_url = $data['trade_url'];
        print_r($trade_url);
        print_r($type);
        print_r($number);
        $sql = "
            INSERT INTO
                offers
            (type,steam_id, number, payment,payment_info,card_info,qiwi_info,trade_url)
            VALUES
            ( '{$type}','{$steam_id}','{$number}','{$payment}','{$payment_info}','{$card_info}','{$qiwi_info}', '{$trade_url}' )";
        self::connect()->query($sql);
    }





}