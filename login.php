<?php

require_once 'inc/bootstrap.php';

$back = $_REQUEST['back'] ?? $_SERVER['HTTP_REFERER'] ?? BASE_URL;
header('Location: ' . $back);

$loggedIn = auth()->login();

if ($loggedIn) {
    echo 'Привет, ' . auth()->user()['login'];
} else {
    echo '<pre>';
    echo auth()->error();
    echo '</pre>';
}
