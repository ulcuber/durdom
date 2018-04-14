<?php

require_once 'inc/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    inc('login');
    var_dump($_SERVER['REQUEST_METHOD']);
    exit();
}

unset($_SESSION['error']);

if (auth()->login()) {
    $back = BASE_URL;
    header('Location: ' . $back);
} else {
    $_SESSION['error'] = auth()->error();
    $back = $_REQUEST['back'] ?? $_SERVER['HTTP_REFERER'] ?? BASE_URL;
    // header('Location: ' . $back);
}
