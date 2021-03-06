<div class="top-banner">
    <div class="header">
        <div class="container">
            <div class="headr-left">
                <div class="social">
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                </div>
                <div class="search">
                    <?php
                    $action = url('news');
                    ?>
                    <form method="GET" action="<?=$action?>">
                        <input type="submit" value="">
                        <input type="text" name="search" value="" placeholder="Поиск...">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="headr-right">
                <div class="details">
                    <ul>
                        <li>
                            <a href="mailto:necros.den@gmail.com">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                necros.den@gmail.com
                            </a>
                        </li>
                        <li>
                            <a href="https://t.me/necro_spider">
                                <i class="fa fa-telegram" aria-hidden="true"></i>
                                @necro_spider
                            </a>
                        </li>
                        <li>
                            <?php
                            $user = auth()->user();
                            if ($user) {
                                echo $user['login'];
                            }
                            ?>
                        </li>
                        <li>
                            <?php
                            if ($user) {
                                $url = url('logout.php');
                                echo '<a href="' . $url . '">Выйти</a>';
                            } else {
                                $url = url('login.php');
                                echo '<a href="' . $url . '">Войти</a>';
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="banner-info">
        <div class="container">
            <div class="logo">
                <h1><a href="<?=url()?>">GamersNews</a></h1>
            </div>
            <div class="top-menu">
                <span class="menu"></span>
                <ul class="nav1">
                    <li class="<?php
                    if (preg_match("/^\/?\z/", $_SERVER['REQUEST_URI'])) {
                        echo 'active';
                    } ?>"><a href="<?=url()?>">Главная</a></li>
                    <!--<li><a href="<?=url('about.php')?>">О нас</a></li>-->
                    <li class="<?php
                    if (preg_match("/\/reviews/", $_SERVER['REQUEST_URI'])) {
                        echo 'active';
                    } ?>"><a href="<?=url('reviews')?>">Обзоры</a></li>
                    <li class="<?php
                    if (preg_match("/\/news/", $_SERVER['REQUEST_URI'])) {
                        echo 'active';
                    } ?>"><a href="<?=url('news')?>">Новости</a></li>
                    <li class="<?php
                    if (preg_match("/\/gallery/", $_SERVER['REQUEST_URI'])) {
                        echo 'active';
                    } ?>"><a href="<?=url('gallery.php')?>">Галерея</a></li>
                    <?php
                    $admin = auth()->admin();
                    if ($admin) {
                        echo '<li><a href="'. url('admin/news/create.php').'">Добавить новость</a></li>';
                        echo '<li><a href="'. url('admin/reviews/create.php'). '">Добавить обзор</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
