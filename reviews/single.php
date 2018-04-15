<?php
require_once '../inc/bootstrap.php';
if (!isset($_REQUEST['id'])) {
    back();
    exit();
}

$id = (int) $_REQUEST['id'];
$review = store('review', $id);
if ($review && isset($review['categories'])) {
    // $categories = implode(', ', array_column($review['categories'], 'name'));
} else {
    // $categories = 'Нет категории';
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GamersNews | <?=$review['head']?></title>

        <link href="<?=url('css/bootstrap.css');?>" rel='stylesheet' type='text/css' />
        <link href="<?=url('css/style.css');?>" rel='stylesheet' type='text/css' />
        <link href="<?=url('css/font-awesome.min.css');?>" rel="stylesheet">
    </head>
<body>

<?php inc('header'); ?>

<!-- banner -->
<div class="banner">
        <div class="bnr2">
       </div>
</div>
<!---->
<div class="blog">
        <div class="container">
            <div class="col-md-8 blog-left" >
                <div class="blog-info">
                    <div class="blog-info-text">

                        <div class="blog-img">

                        </div>
                        <h1><p class="snglp"><?=$review['head']?></p></h1>
                        <h3><p class="snglp"><img src="<?=url('images/reviews/' . $review['imghead'])?>"/></p></h3>
                        <h3><p class="snglp" align="justify"><?=$review['post']?></p></h3>
                        <h3><p class="snglp"><img src="<?=url('images/reviews/' . $review['img'])?>" /></p></h3>
                        <h3><p class="snglp" align="justify"><?=$review['post2']?></p></h3>
                        <h3><p class="snglp"><img src="<?=url('images/reviews/' . $review['img2'])?>" /></p></h3>
                        <?php if ($review['video']) { ?>
                            <iframe width="866" height="600" src="<?=$review['video']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        <?php } ?>
                    </div>
                    <div class="comment-icons">
                        <ul>
                            <li><span class="clndr"></span><?=$review['date']?></li>
                            <li><span class="admin"></span> <a href="#"><?=$review['author']?></a></li>
                            <!-- <li><span class="cmnts"></span> <a href="#"><?=$categories?></a></li> -->
                            <?php if (auth()->admin()) { ?>
                                <li><span class="cmnts"></span><a href="<?=url('admin/reviews/edit.php', ['id' => $review['id']]);?>">Изменить обзор</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php inc('right_block'); ?>
            <div class="clearfix"> </div>
        </div>
</div>

<?php inc('footer'); ?>
<?php inc('right_block_script'); ?>

</body>
</html>
