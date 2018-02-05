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
                    $action = url('news.php');
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
                                $url = url('login.php', ['login' => 'NecroS', 'password' => 'Qwe123456']);
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
                    <li class="active"><a href="index.php">Главная</a></li>
                    <li><a href="<?=url('about.php')?>">О нас</a></li>
                    <li><a href="<?=url('reviews.php')?>">Обзоры</a></li>
                    <li><a href="<?=url('news.php')?>">Новости</a></li>
                    <li><a href="<?=url('gallery.php')?>">Галерея</a></li>
                    <?php
					$admin = auth()->admin();
					if ($admin) {
						echo '<li><a href="'. url('createNews.php').'">Добавить новость</a></li>';
						echo '<li><a href="'. url('createReview.php'). '">Добавить обзор</a></li>';
					} else {
						
					}
					?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
