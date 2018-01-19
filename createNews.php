<?php
require_once 'inc/bootstrap.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Durdom | Создать новость</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">
    </head>
<body>

<?php inc('header'); ?>

<?php
if (auth('status') != 1) {
    echo 'Войдите под правами админа';
    exit(403);
}
$action = url('insertNews.php');
?>
<div class="about">
    <div class="container">
        <h2>Создать новость</h2>
        <form method="GET" action="<?=$action?>">
            <label for="head">Заголовок <input id="head" type="text" name="head" required></label><br>
            <label for="imghead">Картинка заголовка <input id="imghead" type="text" name="imghead" required></label><br>
            <label for="post">Текст <input id="post" type="text" name="post" required></label><br>
            <label for="post2">Второй текст <input id="post2" type="text" name="post2" required></label><br>
            <label for="img">Картинка <input id="img" type="text" name="img" required></label><br>
            <label for="img2">Вторая картинка <input id="img2" type="text" name="img2" required></label><br>
            <label for="author">Автор <input id="author" type="text" name="author" required></label><br>
            <button type="submit">Создать</button>
        </form>
    </div>
</div>
<?php inc('footer'); ?>

</body>
</html>
