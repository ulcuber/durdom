<?php

namespace App;

use mysqli;

/**
 * Функции для авторизации
 */
class Auth
{
    const LOGIN = 'login';
    const PASSWORD = 'password';

    private static $instance;

    /**
     * Текущий авторизованный Пользователь
     * @var Array
     */
    private $user = null;

    /**
     * Ошибка авторизации
     * @var String
     */
    private $error;

    /**
     * Дескриптор соединения с базой
     * @var mysqli
     */
    private $db;

    private function __construct()
    {
        $this->db = Db::instance();
    }

    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function user()
    {
        if (!is_array($this->user) && isset($_SESSION['id'])) {
            $sql = "SELECT * FROM users WHERE id = " . (int) $_SESSION['id'] . " LIMIT 1";
            $user = $this->db->query($sql);
            $this->user = $user ? $user->fetch_assoc() : false;
        }
        return $this->user;
    }

    public function status()
    {
        $user = $this->user();
        return $user ? $user['status'] : null;
    }

    public function admin()
    {
        return (int) $this->status() === ADMIN;
    }

    public function guest()
    {
        return (int) $this->status() !== ADMIN;
    }

    public function error()
    {
        return $this->error;
    }

    public function login()
    {
        $issetParams = isset($_REQUEST[self::LOGIN]) && isset($_REQUEST[self::PASSWORD]);
        if (!$issetParams) {
            return $this->setError('Поля не заданы');
        }

        $this->login = $_REQUEST[self::LOGIN];
        $this->password = $_REQUEST[self::PASSWORD];
        if ($this->login == '') {
            return $this->setError('Пустой логин');
        }
        if ($this->password == '') {
            return $this->setError('Пустой пароль');
        }

        $login = $this->db->real_escape_string(trim($this->login));
        $sql = "SELECT * FROM users WHERE ". self::LOGIN . " = '" . $login . "' LIMIT 1";
        $user = $this->db->query($sql);
        if (!$user) {
            return $this->setError('Пользователь не найден');
        }
        $this->user = $user->fetch_assoc();

        $password = md5(md5($this->password));
        if ($this->user[self::PASSWORD] != $password) {
            return $this->setError('Неверный пароль');
        }

        $_SESSION['id'] = $this->user['id'];
        return true;
    }

    private function setError(string $error)
    {
        $this->error = $error;
        $this->user = null;
        return false;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
