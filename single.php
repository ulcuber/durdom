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
                    <div class="response">
                        <h4>Комментарии</h4>
                        <div class="media response-info">
                            <div class="media-left response-text-left">
                                <a href="#">
                                    <img class="media-object" src="images/icon1.png" alt=""/>
                                </a>

                            </div>

                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="coment-form">
                    <h4>Leave your comment</h4>
                    <form>
                        <input type="text" value="Name " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                        <input type="text" value="Subject " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
                        <input type="text" value="Email (will not be published)*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email (will not be published)*';}" required="">
                        <textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="">Your Comment...</textarea>
                        <input type="submit" value="SUBMIT" >
                    </form>
                </div>
            </div>
            <div class="col-md-4 single-page-right">
                <div class="category blog-ctgry">
                    <h4>Top Games</h4>
                    <div class="list-group">
                        <a href="single.html" class="list-group-item">Cras justo odio</a>
                        <a href="single.html" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="single.html" class="list-group-item">Morbi leo risus</a>
                        <a href="single.html" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="single.html" class="list-group-item">Vestibulum at eros</a>
                        <a href="single.html" class="list-group-item">Cras justo odio</a>
                        <a href="single.html" class="list-group-item">Cras justo odio</a>
                        <a href="single.html" class="list-group-item">Cras justo odio</a>
                    </div>
                </div>
                <div class="recent-posts">
                    <h4>Recent posts</h4>
                    <div class="recent-posts-info">
                        <div class="posts-left sngl-img">
                            <a href="single.html"> <img src="images/img16.jpg" class="img-responsive zoom-img" alt=""/> </a>
                        </div>
                        <div class="posts-right">
                            <label>March 5, 2015</label>
                            <h5><a href="single.html">Finibus Bonorum</a></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing incididunt.</p>
                            <a href="single.html" class="btn btn-primary hvr-rectangle-in">Read More</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="recent-posts-info">
                        <div class="posts-left sngl-img">
                            <a href="single.html"> <img src="images/img17.jpg" class="img-responsive zoom-img" alt=""/></a>
                        </div>
                        <div class="posts-right">
                            <label>March 1, 2015</label>
                            <h5><a href="single.html">Finibus Bonorum</a></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing incididunt.</p>
                            <a href="single.html" class="btn btn-primary hvr-rectangle-in">Read More</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
</div>

<?php inc('footer'); ?>

</body>
</html>
