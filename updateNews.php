<?php
require_once 'inc/bootstrap.php';
$id = (int) $_REQUEST['id'];
$single = store('newsSingle', $id);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Durdom | Редактировать новость</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">
    </head>
<body>

<?php inc('header'); ?>

<div class="contact">
    <div class="container">
        <div class="contact-head">
            <h2>Редактировать новость</h2>
<?php
if (auth('guest')) {
    echo '<h2>Войдите под правами админа</h2>';
} else {
    $action = url('saveNews.php');
?>
            <form method="GET" action="<?=$action?>">
                <div class="col-md-6 contact-left">
                    <input type="hidden" name="id" value="<?=$single['id']?>">
                    <input type="text" name="head" value="<?=$single['head']?>"
                    class="text" placeholder="Заголовок" required>
                    <input type="text" name="imghead" value="<?=$single['imghead']?>"
                    class="text" placeholder="Путь к картинке для превью" required>
                    <input type="text" name="img" value="<?=$single['img']?>"
                    class="text" placeholder="Путь к первой картинке" required>
                    <input type="text" name="img2" value="<?=$single['img2']?>"
                    class="text" placeholder="Путь к второй картинке" required>
                    <input type="text" name="author" value="<?=$single['author']?>"
                    class="text" placeholder="Ник Автора" required>
                </div>
                <div class="col-md-6 contact-right">
                    <textarea name="post" placeholder="Первая половина поста" required><?=$single['post']?></textarea>
                    <textarea name="post2" placeholder="Вторая половина поста" required><?=$single['post2']?></textarea>
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
