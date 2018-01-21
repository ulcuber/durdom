<?php
require_once 'inc/bootstrap.php';
$id = (int) $_REQUEST['id'];
$single = store('newsSingleWithCategories', $id);
if ($single) {
    $categories = implode(', ', array_column($single['categories'], 'name'));
} else {
    $categories = 'Нет категории';
}
?>
<!DOCTYPE HTML>
<html><!--здесь типо новость, комменты прикрутить бы с FB-->
    <head>
        <title>Durdom.PW | <?=$single['head']?></title>
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
<!---->
<div class="blog">
        <div class="container">
            <div class="col-md-8 blog-left" >
                <div class="blog-info">
                    <div class="blog-info-text">
                        <div class="blog-img">

                        </div>
                        <h1><p class="snglp"><?=$single['head']?></p></h1>
                        <h3><p class="snglp"><img src="<?=url($single['imghead'])?>" height="500" width="500"/></p></h3>
                        <h3><p class="snglp"><?=$single['post']?></p></h3>
                        <h3><p class="snglp"><img src="<?=url($single['img'])?>" height="500" width="500"/></p></h3>
                        <h3><p class="snglp"><?=$single['post2']?></p></h3>
                        <h3><p class="snglp"><img src="<?=url($single['img2'])?>" height="500" width="500"/></p></h3>
                    </div>
                    <div class="comment-icons">
                        <ul>
                            <li><span></span><a href="#">123</a> </li>
                            <li><span class="clndr"></span>ДАТА</li>
                            <li><span class="admin"></span> <a href="#"><?=$single['author']?></a></li>
                            <li><span class="cmnts"></span> <a href="#"><?=$categories?></a></li>
                            <li><a href="#" class="like">,,,</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
</div>

<?php inc('footer'); ?>

</body>
</html>
