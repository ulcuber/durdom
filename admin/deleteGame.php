<?php

namespace App;

require_once '../inc/bootstrap.php';
if (!auth()->admin()) {
    exit();
}
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}

$back = isset($_REQUEST['back']) ? $_REQUEST['back']
    : isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : BASE_URL;
header('Location: ' . $back);

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
