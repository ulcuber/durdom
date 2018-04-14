<?php

namespace App;

require_once '../inc/bootstrap.php';
if (!auth()->admin()) {
    exit();
}
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}

header('Location: ' . url('admin'));

$filename = (new Image())->path('images/games')->input('img')->save();
if ($filename) {
    $game['img'] = $filename;
}
$game['game'] = $_REQUEST['game'];
$game['info'] = $_REQUEST['info'];

$result = store()->insert('games', $game);

if (!$result) {
    $_SESSION['error'] = mysqli_error(Db::instance());
}
