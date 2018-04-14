<?php

require_once 'inc/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    inc('login');
    exit();
}

if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}

if (auth()->login()) {
    $back = $_ENV['BASE_URL'];
    header('Location: ' . $back);
} else {
    $_SESSION['error'] = auth()->error();
    back();
}
