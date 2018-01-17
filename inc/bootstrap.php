<?php

/**
 * Загрузочный файл для всех страниц
 * Начинает сессию
 * Подключает декларации
 * Регистрирует функцию автозагрузки классов по PSR
 */

session_start();

// DEBUG
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'inc/declarations.php';
spl_autoload_register('autoload');
