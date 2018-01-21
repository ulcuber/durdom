<?php
require_once 'inc/bootstrap.php';

if (isset($_REQUEST['search'])) {
    $news = store()->searchNewsWithCategories($_REQUEST['search']);
} else {
    $news = store('newsWithCategories');
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Durdom.PW | Новости</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<!--pages-starts-->
<div class="pages">
    <div class="container">
        <h2 class="top">Новости</h2>

        <?php
        foreach ($news as $row) {
            $url = url('single.php', ['id' => $row['id']]);
        ?>
            <a href="<?=$url?>">News item <?=$row['head']?></a>
            <pre>
                <?=var_dump($row)?>
            </pre>
        <?php } ?>

        <div class="clearfix"></div>
    </div>
</div>
<!--pages-end---->

<?php inc('footer'); ?>

</body>
</html>
