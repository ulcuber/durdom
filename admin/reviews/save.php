<?php

namespace App;

require_once '../../inc/bootstrap.php';
redirectNotAdmin();
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}

header('Location: ' . url('admin/reviews'));

$imghead = (new Image())->path('images/reviews')->input('imghead')->save();
if ($imghead) {
    $item['imghead'] = $imghead;
}
$img = (new Image())->path('images/reviews')->input('img')->save();
if ($img) {
    $item['img'] = $img;
}
$img2 = (new Image())->path('images/reviews')->input('img2')->save();
if ($img2) {
    $item['img2'] = $img2;
}
$item['head'] = $_REQUEST['head'];
$item['post'] = $_REQUEST['post'];
$item['post2'] = $_REQUEST['post2'];
$item['author'] = $_REQUEST['author'];
$item['video'] = $_REQUEST['video'];

$result = store()->insert('reviews', $item);

if (!$result) {
    $_SESSION['error'] = mysqli_error(Db::instance());
}
