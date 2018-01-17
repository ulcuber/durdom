<?php

require_once 'inc/bootstrap.php';

$back = $_REQUEST['back'] ?? $_SERVER['HTTP_REFERER'];
header('Location: ' . $back);

$loggedIn = auth()->login();

if ($loggedIn) {
    echo 'Привет, ' . auth()->user()['login'];
} else {
    echo auth()->error();
}

var_dump($loggedIn);
