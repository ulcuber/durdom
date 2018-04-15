<?php

namespace App;

require_once '../../inc/bootstrap.php';
redirectNotAdmin();
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}

back();

if (!isset($_REQUEST['id'])) {
    $_SESSION['error'] = 'Не задан id';
    exit();
}

$id = (int) $_REQUEST['id'];
$item = store('byId', 'news', $id);
if (!$item) {
    $_SESSION['error'] = 'Новость не найдена';
    exit();
}

$item['imghead'] = (new Image())->path('images/news')->input('imghead')->resave($item['imghead']);
$item['img'] = (new Image())->path('images/news')->input('img')->resave($item['img']);
$item['img2'] = (new Image())->path('images/news')->input('img2')->resave($item['img2']);

$item['head'] = $_REQUEST['head'];
$item['post'] = $_REQUEST['post'];
$item['post2'] = $_REQUEST['post2'];
$item['author'] = $_REQUEST['author'];
$item['video'] = $_REQUEST['video'];

$result = store()->update('news', $item);

if (!$result) {
    $_SESSION['error'] = mysqli_error(Db::instance());
}
