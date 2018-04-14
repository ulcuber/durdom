<?php

/**
 * Загрузочный файл для всех страниц
 * Начинает сессию
 * Подключает декларации
 * Регистрирует функцию автозагрузки классов по PSR
 */

session_start();

// DEBUG

ini_set('error_reporting', E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('html_errors', 1);
ini_set('docref_root', 'http://php.net/manual/ru/');
ini_set('docref_ext', '.php');

require_once __DIR__ . '/declarations.php';
spl_autoload_register('autoload');
