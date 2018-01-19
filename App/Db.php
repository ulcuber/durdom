<?php

namespace App;

use mysqli;

class Db
{
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = 'secret';
    const DATABASE = 'durdom';

    protected static $db;

    private function __construct()
    {
        var_dump(__METHOD__, $this->db);
    }

    public static function instance()
    {
        if (null === static::$db) {
            static::$db = new mysqli(
                static::HOST,
                static::USER,
                static::PASSWORD,
                static::DATABASE
            );

            if (mysqli_connect_error()) {
                die('Ошибка подключения (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
            }

            if (!static::$db->set_charset("utf8")) {
                die("Ошибка при загрузке набора символов utf8:" . static::$db->error);
            }
        }
        return static::$db;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
