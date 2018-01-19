<?php
session_start();

$back = $_REQUEST['back'] ?? $_SERVER['HTTP_REFERER'];
header('Location: ' . $back);

session_unset();
session_destroy();
