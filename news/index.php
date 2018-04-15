<?php
require_once '../inc/bootstrap.php';

if (isset($_REQUEST['search'])) {
    $news = store()->searchNewsWithCategories($_REQUEST['search']);
} else {
    $url = 'news';
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $news = store('newsWithCategoriesForPage', $page);
    $hasNextPage = store()->hasPage('news', $page + 1);
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GamersNews | Новости</title>

        <link href="<?=url('css/bootstrap.min.css');?>" rel='stylesheet' type='text/css' />
        <link href="<?=url('css/style.css');?>" rel='stylesheet' type='text/css' />
        <link href="<?=url('css/font-awesome.min.css');?>" rel="stylesheet">
    </head>
<body>

<?php inc('header'); ?>

<!-- banner -->
<div class="banner">
    <div class="bnr2"></div>
</div>
<!-- content -->
<div class="review">
    <div class="container">
        <h2>Новости</h2>
        <div class="review-md1">

            <?php
            foreach ($news as $row) {
                  $url = url('news/single.php', ['id' => $row['id']]);
            ?>
                <div class="col-md-4 sed-md">
                    <div class=" col-1">
                        <a href="<?=$url?>"><img class="img-responsive" src="<?=url('images/news/' . $row['imghead'])?>" alt="<?=$row['head']?>"></a>
                         <h4><a href="<?=$url?>"><?=$row['head']?></a></h4>
                        <p><?=mb_substr($row['head'], 0, 40)?></p>
                    </div>
                </div>
            <?php } ?>

            <div class="clearfix"> </div>
            <?php include ROOT_DIR . '/inc/paginator.php'; ?>
        </div>
    </div>
</div>

<?php inc('footer'); ?>

</body>
</html>
