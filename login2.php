<?php
require_once 'inc/bootstrap.php';
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

<div class="background_back">
    <div class="box">
        <div class="logo">
            
        </div>
        <form id="userlogin" action="login.php" method="POST">
        <div class="login">
           <div class="input1">
                <div class="title">Имя</div>
                <input type="text" name="username" <?php if (isset($_POST['username'])) echo 'value="'.$_POST['username'].'"';?> required>
           </div>
           <div class="input2">
               <div class="title">Пароль</div>
               <input type="password" name="password" <?php if (isset($_POST['password'])) echo 'value="'.$_POST['password'].'"';?> required>
           </div>
           <div class="login_button">
               <input type="submit" class="ln-button" value="Войти" />
           </div>
        </form>
        </div>
    </div>
</div>

</body>
</html>