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
$review = store('byId', 'reviews', $id);
if (!$review) {
    $_SESSION['error'] = 'Обзор не найден';
    exit();
}

$result = store()->deleteById('reviews', $id);

if (!$result) {
    $_SESSION['error'] = mysqli_error(Db::instance());
} else {
    (new Image())->path('images/reviews')->delete($review['img']);
}
