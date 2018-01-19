<?php

namespace App;

require_once 'inc/bootstrap.php';

$back = $_REQUEST['back'] ?? $_SERVER['HTTP_REFERER'] ?? BASE_URL;
header('Location: ' . $back);

if (auth('status') != 1) {
    echo 'Войдите под правами админа';
    exit(403);
}

$newsItem = [];
$newsItem['head'] = $_REQUEST['head'];
$newsItem['imghead'] = $_REQUEST['imghead'];
$newsItem['post'] = $_REQUEST['post'];
$newsItem['post2'] = $_REQUEST['post2'];
$newsItem['img'] = $_REQUEST['img'];
$newsItem['img2'] = $_REQUEST['img2'];
$newsItem['author'] = $_REQUEST['author'];

$result = store()->insertNews($newsItem);

if (!$result) {
    echo '<pre>';
    echo 'Ошибка:' . PHP_EOL;
    echo Db::instance()->error;
    echo '</pre>';
} else {
    echo 'Успешно';
}
