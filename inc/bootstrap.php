<?php

/**
 * Загрузочный файл для всех страниц
 * Начинает сессию
 * Подключает декларации
 * Регистрирует функцию автозагрузки классов по PSR
 */

session_start();

require_once __DIR__ . '/declarations.php';
spl_autoload_register('autoload');

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$debug = $_ENV['DEBUG'] === 'true' ? true : false;

ini_set('error_reporting', E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);
ini_set('display_errors', $debug);
ini_set('display_startup_errors', $debug);
ini_set('html_errors', $debug);
ini_set('docref_root', 'http://php.net/manual/ru/');
ini_set('docref_ext', '.php');

if ($_ENV['PRODUCTION'] === 'true') {
    set_error_handler('vk_error_handler', 1);
    register_shutdown_function('vk_shutdown_function');
}
