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
$game = store('byId', 'games', $id);
if (!$game) {
    $_SESSION['error'] = 'Игра не найдена';
    exit();
}

$result = store()->deleteById('games', $id);

if (!$result) {
    $_SESSION['error'] = mysqli_error(Db::instance());
} else {
    (new Image())->path('images/games')->name($game['img'])->delete();
}
