<?php

/**
 * Декларации вне namespace (глобально)
 * Файл содержит константы, функции
 */

define('USER', 0);
define('ADMIN', 1);
define('MODERATOR', 2);

define('ROOT_DIR', dirname(__DIR__));
define('ADMIN_DIR', ROOT_DIR . DIRECTORY_SEPARATOR . 'admin');

/**
 * Кодирует абсолютную url строку
 * @param  string $url
 * @param  array  $params
 * @return string
 */
function url($url = null, array $params = [])
{
    return $_ENV['BASE_URL'] . $url . (!empty($params) ? '?' . http_build_query($params) : '');
}

/**
 * Функция автозагрузки классов
 * @see https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
 */
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require ROOT_DIR . DIRECTORY_SEPARATOR . $fileName;
}

/**
 * Сокращение для обращения к хранилищу
 * store()->getNews(); равносильно store('news');
 * @param string $method Имя метода без get с маленькой буквы
 * @param mixed Остальные параметры передаются в указанный метод
 * @return \App\Store|\Traversable
 */
function store($method = null)
{
    $store = \App\Store::instance();
    if ($method) {
        $method = 'get' . ucfirst($method);
        $params = func_get_args();
        array_shift($params);
        return call_user_func_array([$store, $method], $params);
    }
    return $store;
}

/**
 * Сокращение для работы с сессией
 * auth()->user(); равносильно auth('user');
 * @param string $method Имя метода
 * @param mixed Остальные параметры передаются в указанный метод
 * @return \App\Auth
 */
function auth($method = null)
{
    $auth = \App\Auth::instance();
    if ($method) {
        $params = func_get_args();
        array_shift($params);
        return call_user_func_array([$auth, $method], $params);
    }
    return $auth;
}

/**
 * Помощник подключения файлов из папки inc
 * @param  string $inc Имя файла без расширения
 */
function inc($inc)
{
    include ROOT_DIR . '/inc/' . $inc. '.php';
}

/**
 * Возвращает назад
 */
function back()
{
    $back = isset($_REQUEST['back']) ?
        $_REQUEST['back']
        : isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : url();
    header('Location: ' . $back);
}

/**
 * Переадресует обычных пользователей
 */
function redirectNotAdmin()
{
    if (!auth()->admin()) {
        header('Location: ' . url());
        exit();
    }
}

/**
 * Возвращает название статуса пользователя
 * @var int
 * @return string
 */
function get_user_status_name($status)
{
    switch ($status) {
        case USER:
            return 'Пользователь';
        case ADMIN:
            return 'Админ';
        case MODERATOR:
            return 'Модератор';
    }
}

/**
 * Пользовательский обработчик ошибок
 * Посылает описание ошибки через VkApi
 */
function vk_error_handler($errno, $errstr, $errfile, $errline)
{
    $message = '[ERROR] ' .  $errstr . PHP_EOL . $errfile . ':' .$errline;
    (new \Vk\Api())->messagesSend(explode(',', $_ENV['VK_MY_ID']), $message);
    return true;
}

/**
 * Функция аварийного завершения скрипта
 * Посылает описание ошибки через VkApi
 */
function vk_shutdown_function()
{
    $error = error_get_last();
    if ($error['type'] == E_ERROR) {
        $message = '[SHUTDOWN] ' . $error['message'] . PHP_EOL . $error['file'] . ':' . $error['line'];
        (new \Vk\Api())->messagesSend(explode(',', $_ENV['VK_MY_ID']), $message);
    }
}
