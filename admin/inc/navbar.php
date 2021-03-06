<div class="navbar"></div>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?=url()?>">
                Сайт
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
                <li class="<?php
                if (preg_match("/admin\/games/", $_SERVER['REQUEST_URI'])) {
                    echo 'active';
                } ?>"><a href="<?=url('admin/games')?>">Игры</a></li>
            </ul>
            <ul class="nav navbar-nav">
                &nbsp;
                <li class="<?php
                if (preg_match("/admin\/news/", $_SERVER['REQUEST_URI'])) {
                    echo 'active';
                } ?>"><a href="<?=url('admin/news')?>">Новости</a></li>
            </ul>
            <ul class="nav navbar-nav">
                &nbsp;
                <li class="<?php
                if (preg_match("/admin\/reviews/", $_SERVER['REQUEST_URI'])) {
                    echo 'active';
                } ?>"><a href="<?=url('admin/reviews')?>">Обзоры</a></li>
            </ul>
            <ul class="nav navbar-nav">
                &nbsp;
                <li class="<?php
                if (preg_match("/admin\/users/", $_SERVER['REQUEST_URI'])) {
                    echo 'active';
                } ?>"><a href="<?=url('admin/users')?>">Пользователи</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                    <!-- <li><a href="/">None</a></li> -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            Admin <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?=url('logout.php')?>"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="<?=url('logout.php')?>" method="POST" style="display: none;">

                                </form>
                            </li>
                        </ul>
                    </li>
            </ul>
        </div>
    </div>
</nav>
