<?php

namespace App;

require_once 'inc/bootstrap.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Durdom.PW | Обзоры</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!--//theme-style-->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Custom Theme files -->
    </head>
<body>

<?php inc('header'); ?>

<!-- banner -->
<div class="banner">
        <div class="bnr2">
       </div>
</div>
<!-- content -->
<div class="review">
    <div class="container">
        <h2 >Обзоры</h2>
        <div class="review-md1">

            <?php foreach (store('reviews') as $row) { ?>
                <div class="col-md-4 sed-md">
                    <div class=" col-1">
                        <a href="single.html"><img class="img-responsive" src="images/re1.jpg" alt=""></a>
                         <h4><a href="single.html"><?=$row['Head']?></a></h4>
                        <p>текст</p>
                    </div>
                </div>
            <?php } ?>

            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<?php inc('footer'); ?>

</body>
</html>
