<?php

require_once 'inc/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    inc('login');
    exit();
}

unset($_SESSION['error']);

if (auth()->login()) {
    header('Location: index.php ');
} else {
    $_SESSION['error'] = auth()->error();
}
