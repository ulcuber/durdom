<?php
require_once 'inc/bootstrap.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Durdom | О нас</title>
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
    <div class="bnr2"></div>
</div>
<!-- About -->
<div class="about">
     <div class="container">
         <h2>О нас</h2>
         <div class="about-info-grids">
             <div class="col-md-5 abt-pic">
                 <img src="images/abt.jpg" class="img-responsive" alt=""/>
             </div>
             <div class="col-md-7 abt-info-pic">
                 <h3>Заголовок</h3>
                 <p>ТЕКСТ</p>
                 <ul>
                     <li>ПУНКТ1.</li>
                     <li>ПУНКТ2</li>

                 </ul>
             </div>
             <div class="clearfix"></div>
         </div>
         <div class="testimonals">
                <h3>Отзывы</h3>
                <div class="testimonal-grids">
                     <div class="col-md-4 testimonal-grid">
                         <div class="testi-info">
                             <p>""Якобы отзыв</p>
                             <h4>ИМЯ РЕЦЕНЗОРА</h4>
                         <a href="#">якобы сайт отзовика</a>
                         </div>
                     </div>
                     <div class="col-md-4 testimonal-grid">
                         <div class="testi-info">
                        <p>""Якобы отзыв</p>
                             <h4>ИМЯ РЕЦЕНЗОРА</h4>
                         <a href="#">якобы сайт отзовика</a>
                         </div>
                     </div>
                     <div class="col-md-4 testimonal-grid">
                         <div class="testi-info">
                         <p>""Якобы отзыв</p>
                             <h4>ИМЯ РЕЦЕНЗОРА</h4>
                         <a href="#">якобы сайт отзовика</a>
                         </div>
                     </div>
                     <div class="clearfix"></div>
                </div>
           </div>
           <div class="team">
              <h3>Наша комманда</h3>
              <div class="grid_4">
                <div class="team-grid">
                           <img src="images/a1.jpg" alt="">
                           <h4>ЯКОБЫ СОТРУДНИК</h4>
                          <p>ЕГО ОПИСАНИЕ </p>
                      </div>
              </div>
              <div class="grid_4">
                 <div class="team-grid">
                           <img src="images/a2.jpg" alt="">
                          <h4>ЯКОБЫ СОТРУДНИК</h4>
                          <p>ЕГО ОПИСАНИЕ </p>
                      </div>
              </div>
              <div class="grid_4 span66">
                <div class="team-grid">
                           <img src="images/a3.jpg" alt="">
                           <h4>ЯКОБЫ СОТРУДНИК</h4>
                          <p>ЕГО ОПИСАНИЕ </p>
                      </div>
              </div>
              <div class="grid_4">
                      <div class="team-grid">
                           <img src="images/a4.jpg" alt="">
                           <h4>ЯКОБЫ СОТРУДНИК</h4>
                          <p>ЕГО ОПИСАНИЕ </p>
                      </div>
             </div>
             <div class="clearfix"></div>
          </div>
     </div>
</div>

<?php inc('footer'); ?>

</body>
</html>
