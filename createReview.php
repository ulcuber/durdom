<?php
require_once 'inc/bootstrap.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>GamersNews | Добавить обзор</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!--//theme-style-->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">

    </head>
<body>

<?php inc('header'); ?>

<!-- banner -->
<div class="banner">
        <div class="bnr2">
       </div>
</div>

<div class="contact">
    <div class="container">
        <div class="contact-head">
            <h2>Добавить обзор</h2>
<?php
if (auth('guest')) {
    echo '<h2>Войдите под правами админа</h2>';
} else {
    $action = url('insertReview.php');
?>
            <form method="GET" action="<?=$action?>">
                <div class="col-md-6 contact-left">
                    <input type="text" name="head" class="text" placeholder="Заголовок" required>
                    <input type="text" name="imghead" class="text" placeholder="Путь к картинке для превью" required>
                    <input type="text" name="img" class="text" placeholder="Путь к первой картинке" required>
                    <input type="text" name="img2" class="text" placeholder="Путь к второй картинке" required>
                    <input type="text" name="author" class="text" placeholder="Ник Автора" required>
                     <input type="text" name="video" class="text" placeholder="Ссылка на видео" required>
                     <input type="text" name="date" class="text" placeholder="Дата в формате ГГГГ-ММ-ДД" required>
                </div>
                <div class="col-md-6 contact-right">
                    <textarea name="post" placeholder="Первая половина поста" required></textarea>
                    <textarea name="post2" placeholder="Вторая половина поста" required></textarea>
                    <input type="submit" value="Добавить"/>
                </div>
                <div class="clearfix"></div>
            </form>
<?php } ?>
        </div>
    </div>
</div>

<?php inc('footer'); ?>

</body>
</html>