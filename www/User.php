<?php
require 'db.php';
class User extends DB {

    public static function existsUser($steam_id) {
        $result = self::connect()->query("
            SELECT * FROM
                users
            WHERE
                steam_id = '{$steam_id}'
        ")->fetch_row();


        if (!empty($result)) {
            return true;
        }
        return false;
    }

    public static function handleUserLogin($data) {
        if (self::existsUser($data['steam_id'])) {
            self::updateUser($data);
        } else {
            self::addUser($data);
        }
    }

    public static function addUser($data) {
        $name = $data['name'];
        $steam_id = $data['steam_id'];
        $sql = "
            INSERT INTO
                users
            (name, steam_id)
            VALUES
            ('{$name}', '{$steam_id}')";
        self::connect()->query($sql);
    }

    public static function updateUser($data) {
        self::connect()->query("
            UPDATE
                users
            SET
                name = '{$data['name']}'
            WHERE
                steam_id = '{$data['steam_id']}'
        ");

    }

    public static function updateTradeUrl($trade_url, $steam_id, $card_info, $qiwi_info) {
        self::connect()->query("
            UPDATE
                users
            SET
                trade_url = '{$trade_url}',
                card_info = '{$card_info}',
                qiwi_info = '{$qiwi_info}'
            WHERE
                steam_id = '{$steam_id}'
        ");
    }

}

