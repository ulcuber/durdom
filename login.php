<?php

require_once 'inc/bootstrap.php';

var_dump($_SERVER['REQUEST_METHOD']);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    inc('login');
    exit();
}

if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}

if (auth()->login()) {
    $back = BASE_URL;
    // header('Location: ' . $back);
} else {
    $_SESSION['error'] = auth()->error();
    $back = $_REQUEST['back'] ?? $_SERVER['HTTP_REFERER'] ?? BASE_URL;
    // header('Location: ' . $back);
}
