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

$result = store()->deleteById('news', $id);

if (!$result) {
    $_SESSION['error'] = mysqli_error(Db::instance());
} else {
    (new Image())->path('images/news')->delete($item['img']);
}
