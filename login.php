<?php

require_once 'inc/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    inc('login');
    exit();
}

$loggedIn = auth()->login();

if ($loggedIn) {
    unset($_SESSION['error']);
    header('Location: index.php ');
} else {
    $_SESSION['error'] = auth()->error();
}
