<?php
require_once 'inc/bootstrap.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Durdom | Добавить обзор</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!--//theme-style-->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">

    </head>
<body>
<?php inc('header'); ?>
<div class="contact">
	 <div class="container">
		 <div class="contact-head">
		 	 <h2>Добавить обзор</h2>
			  <form>
				  <div class="col-md-6 contact-left">
					<input type="text" class="text" value="Заголовок" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'head';}">
					<input type="text" class="text" value="Путь к картинке для превью" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'imghead';}">
					<input type="text" class="text" value="Путь к первой картинке" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'img';}">
					<input type="text" class="text" value="Путь к второй картинке" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'img2';}">
					<input type="text" class="text" value="Ник Автора" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'author';}">
				 </div>
				 <div class="col-md-6 contact-right">
						 <textarea value="post1" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'post1';}">Первая половина поста</textarea>
						 <textarea value="post2" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'post2';}">Вторая половина поста</textarea>
						 <input type="submit" value="Добавить"/>
				 </div>
				 <div class="clearfix"></div>
			 </form>
		 </div>
	 </div>
</div>
<?php inc('footer'); ?>

<script src="js/responsiveslides.min.js"></script>
<script>
   $(function () {
     $("#slider").responsiveSlides({
       auto:true,
       nav: false,
       speed: 500,
       namespace: "callbacks",
       pager:true,
     });
   });
</script>
</body>
</html>
