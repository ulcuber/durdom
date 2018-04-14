<?php
require_once 'inc/bootstrap.php';
$id = (int) $_REQUEST['id'];
$review = store('News2', $id);
if ($review && isset($review['categories'])) {
    $categories = implode(', ', array_column($review['categories'], 'name'));
} else {
    $categories = 'Нет категории';
}
?>

<?php

if (isset($_REQUEST['search'])) {
    $news = store()->searchNewsWithCategories($_REQUEST['search']);
} else {
    $news = store('newsWithCategories');
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Durdom.PW | <?=$review['head']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="js/jquery.min.js"></script>

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
                        <h1><p class="snglp"><?=$review['head']?></p></h1>
                        <h3><p class="snglp"><img src="<?=$review['imghead']?>"/></p></h3>
                        <h3><p class="snglp" align="justify"><?=$review['post']?></p></h3>
                        <h3><p class="snglp"><img src="<?=$review['img']?>" /></p></h3>
                        <h3><p class="snglp" align="justify"><?=$review['post2']?></p></h3>
                        <h3><p class="snglp"><img src="<?=$review['img2']?>" /></p></h3>
                        <iframe width="866" height="600" src="<?=$review['video']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <div class="comment-icons">
                        <ul>
                            <li><span class="clndr"></span><?=$review['date']?></li>
                            <li><span class="admin"></span> <a href="#"><?=$review['author']?></a></li>
                            
                            <?php
					$admin = auth()->admin();
					if ($admin) {
						echo '<li><span class="cmnts"></span><a href="'. url('updateNews.php', ['id' => $review['id']]). '">Изменить новость</a></li>';
					} else {
						
					}
					?>
                            
                        </ul>
                    </div>
                </div>
            </div>
             <div id="right-blockk">
                      	
                      		<script>
								
								
								if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
									
								}else{
									
								$(document).scroll(function() {
								checkOffset();
								});
								
								function checkOffset() {
    							if($('#right-blockk').offset().top + $('#right-blockk').height() 
                                           >= $('.footer').offset().top - 10)
        						$('#right-blockk').css('position', 'absolute');
    							if($(document).scrollTop() + window.innerHeight < $('.footer').offset().top)
        						$('#right-blockk').css('position', 'fixed');
								}
									
								};
								
								

								
							</script>
                       	
                       			
                        	<h2>Последние обзоры</h2>
                        	<br>
                        	   <?php
            						foreach (store('reviews') as $row) {
                  					$url = url('review.php', ['id' => $row['id']]);
 								?>
             					<div class="kill-me">
              					<h4><a href="<?=$url?>"><?=$row['head']?></a></h4>
                        		<p><?=mb_substr($row['post'], 0, 60)?></p>
                        		</div>
    							<?php } ?>
                       
                       
                        </div>
            <div class="clearfix"> </div>
        </div>
</div>

<?php inc('footer'); ?>

</body>
</html>
