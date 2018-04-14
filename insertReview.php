<?php

namespace App;

require_once 'inc/bootstrap.php';

back();

if (auth('guest')) {
    echo 'Войдите под правами админа';
    exit(403);
}

$review = [];
$review['head'] = $_REQUEST['head'];
$review['imghead'] = $_REQUEST['imghead'];
$review['post'] = $_REQUEST['post'];
$review['post2'] = $_REQUEST['post2'];
$review['img'] = $_REQUEST['img'];
$review['img2'] = $_REQUEST['img2'];
$review['author'] = $_REQUEST['author'];

$result = store()->insertReview($review);

if (!$result) {
    echo '<pre>';
    echo 'Ошибка:' . PHP_EOL;
    echo Db::instance()->error;
    echo '</pre>';
} else {
    echo 'Успешно';
}
