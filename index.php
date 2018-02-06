<?php
require_once 'inc/bootstrap.php';
$review = store('lastReview');
$news = store('lastNews', 1);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Durdom | Главная</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!--//theme-style-->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">

    </head>
<body>
<?php inc('header'); ?>
<!-- Slider-starts1-Here -->
<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides" id="slider">
            <div class="slid banner1">
                <div class="caption">
                   <h3>Добро пожаловать в GamersNews.</h3>
                    <p>GamersNews, с нами интересно.</p>

                </div>
            </div>
            <div class="slid banner2">
                <div class="caption">
                    <h3>Самые лучшие новости.</h3>
                    <p>Читай только лучшее.</p>
                </div>
            </div>
            <div class="slid banner3">
                <div class="caption">
                    <h3>Самые свежие новости.</h3>
                    <p>Читай новости пока они еще пахнут свежестью.</p>
                </div>
            </div>
        </ul>
    </div>
</div>

<!-- latest -->
<div class="latest">
    <div class="container">
         <div class="latest-games">
             <h3>Последние релизы игр</h3>
             <span></span>
         </div>
         <div class="latest-top">
                <div class="col-md-5 trailer-text">
                   <div class="sub-trailer">
                       <div class="col-md-4 sub-img">
                            <img src="images/v2.jpg" alt="img07"/>
                       </div>
                       <div class="col-md-8 sub-text">
                                <a href="#">Stalker 2 (PC)</a>
                             <p>Глава компании Сергей Григорович сообщил, что игра базируется на новом мультиплатформенном движке, созданном с нуля. В разработке также применялась обновленная версия движка X-Ray.</p>
                       </div>
                        <div class="clearfix"> </div>
                   </div>
                    <div class="sub-trailer">
                       <div class="col-md-4 sub-img">
                            <img src="images/v1.jpg" alt="img07"/>
                       </div>
                       <div class="col-md-8 sub-text">
                                <a href="#"> Metro: Exodus
(PC,Xbox One,PS 4)</a>
                             <p>Metro Exodus – новый шутер от 1-го лица, разрабатываемый украинской студией 4A Games и издаваемый германской компанией Deep Silver. Создание игры началось в 2014 году в студиях 4A Games в Мальте и в Киеве. Это третья часть серии Metro, основанной на романах Дмитрия Глуховского. Действие продолжается после Metro: Last Light и Metro 2033.</p>
                       </div>
                        <div class="clearfix"> </div>
                   </div>
                    <div class="sub-trailer">
                       <div class="col-md-4 sub-img">
                            <img src="images/v3.jpg" alt="img07"/>
                       </div>
                       <div class="col-md-8 sub-text">
                                <a href="#">Death Stranding (PS4)</a>
                             <p>Death Stranding – экшн японской студии Kojima Productions, первая игра директора Хидэо Кодзимы и его компании после выхода Kojima Productions из Konami и превращения в независимую студию. Игру анонсировали на конференции Sony на E3 2016. Главных персонажей изобразят актеры Норман Рид и Мэдс Миккельсен – посредством захвата движения, сканирования лица и голоса. Режиссер Гильермо дель Торо станет прообразом другого персонажа посредством сканирования лица и тела. Название игры происходит от феномена выбрасыванием на мель («stranding») китов. Действие игры происходит в открытом мире. Есть мультиплеерные функции. Полномасштабная разработка игры началась в 2017 году.</p>
                       </div>
                        <div class="clearfix"> </div>
                   </div>
                </div>
                <div class="col-md-7 trailer">
                 <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLY0KbDiiFYeMUnqOjbB-iz0pkQIdjNjsb" frameborder="0" gesture="media" allowfullscreen></iframe>
                 <iframe width="560" height="315" src="https://www.youtube.com/embed/lKgaa8wXr7Q" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                 <div class="clearfix"> </div>
            </div>
    </div>
</div>
<!-- poster -->
<?php
foreach ($news as $row) {
      $url = url('single.php', ['id' => $row['id']]);
?>
<div class="poster">
     <div class="container">
         <div class="poster-info">
             <h3><?=$row['head']?></h3>
             <p><?=mb_substr($row['post2'], 0, 80)?></p>
              <a class="hvr-bounce-to-bottom" href="<?=$url?>">Подробнее</a>
         </div>
     </div>
</div>
<?php } ?>
<!-- post 2 -->
<?php

    $url = url('review.php', ['id' => $review['id']]);
?>
<div class="x-box">
     <div class="container">
         <div class="x-box_sec">
             <div class="col-md-7 x-box-left">
                 <h2><?=$review['head']?></h2>
                <p><?=mb_substr($review['post2'], 0, 80)?></p>
                 <a class="hvr-bounce-to-top" href="<?=$url?>">Подробнее</a>
             </div>
             <div class="col-md-5 x-box-right">
                 <img src="images/xbox.jpg" class="img-responsive" alt=""/>
             </div>

             <div class="clearfix"></div>
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
