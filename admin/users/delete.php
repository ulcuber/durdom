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
$user = store('byId', 'users', $id);
if (!$user) {
    $_SESSION['error'] = 'Пользователь не найден';
    exit();
}

$result = store()->deleteById('users', $id);

if (!$result) {
    $_SESSION['error'] = mysqli_error(Db::instance());
} else {
    // (new Image())->path('images/users')->name($user['img'])->delete();
}
