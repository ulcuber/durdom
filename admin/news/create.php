<?php
require_once '../../inc/bootstrap.php';
if (!auth()->admin()) {
    echo 'Войдите в систему';
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Создать</title>
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="<?=url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=url('css/style.css')?>" />
    <link rel="stylesheet" href="<?=url('css/font-awesome.min.css')?>" />
</head>
<body>
    <div id="app">

        <?php include ADMIN_DIR . '/inc/navbar.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default table-responsive">
                        <div class="panel-heading">Создать новость</div>

<form class="form-horizontal"
    method="POST"
    action="<?=url('admin/game/save.php')?>"
    enctype="multipart/form-data">
    <div class="panel-body">
        <div class="form-group">
            <label for="game" class="col-md-3 control-label">Заголовок</label>
            <div class="col-md-9">
                <input id="game" type="text" class="form-control" name="game" required>
            </div>
        </div>
        <div class="form-group">
            <label for="imghead" class="col-md-3 control-label">Превью</label>
            <div class="col-md-3">
                <input id="imghead" type="file" name="imghead" required>
            </div>
        </div>
        <div class="form-group">
            <label for="post" class="col-md-3 control-label">Первая половина</label>
            <div class="col-md-9">
                <textarea id="post" name="post" class="form-control" rows="6" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="img" class="col-md-3 control-label">Первая картинка</label>
            <div class="col-md-3">
                <input id="img" type="file" name="img" required>
            </div>
        </div>
        <div class="form-group">
            <label for="post2" class="col-md-3 control-label">Вторая половина</label>
            <div class="col-md-9">
                <textarea id="post2" name="post2" class="form-control" rows="6" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="img2" class="col-md-3 control-label">Вторая картинка</label>
            <div class="col-md-3">
                <input id="img2" type="file" name="img2" required>
            </div>
        </div>
        <div class="form-group">
            <label for="author" class="col-md-3 control-label">Автор</label>
            <div class="col-md-9">
                <input id="author" type="text" class="form-control" name="author" required>
            </div>
        </div>
        <div class="form-group">
            <label for="video" class="col-md-3 control-label">Видео</label>
            <div class="col-md-9">
                <input id="video" type="text" class="form-control" name="video" required>
            </div>
        </div>
        <div class="btn-group" role="group" aria-label="...">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
        <div class="error">
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
            }
            ?>
        </div>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="<?=url('js/jquery.min.js');?>"></script>
    <script src="<?=url('js/bootstrap.min.js');?>"></script>
</body>
</html>
