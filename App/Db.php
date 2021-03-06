<?php

namespace App;

use mysqli;

class Db
{
    protected static $db;

    private function __construct()
    {
        // var_dump(__METHOD__, $this->db);
    }

    public static function instance()
    {
        if (null === static::$db) {
            static::$db = new mysqli(
                $_ENV['DB_HOST'],
                $_ENV['DB_USERNAME'],
                $_ENV['DB_PASSWORD'],
                $_ENV['DB_DATABASE']
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
