<?php
require_once '../inc/bootstrap.php';
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

        <?php inc('navbar'); ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default table-responsive">
                        <div class="panel-heading">Создать игру</div>

<form class="form-horizontal"
    method="POST"
    action="<?=url('admin/saveGame.php')?>"
    enctype="multipart/form-data">
    <div class="panel-body">
        <div class="form-group">
            <label for="game" class="col-md-3 control-label">Название</label>
            <div class="col-md-9">
                <input id="game" type="text" class="form-control" name="game" required>
            </div>
        </div>
        <div class="form-group">
            <label for="info" class="col-md-3 control-label">Описание</label>
            <div class="col-md-9">
                <textarea id="info" name="info" class="form-control" rows="6" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="img" class="col-md-3 control-label">Картинка</label>
            <div class="col-md-3">
                <input id="img" type="file" name="img" required>
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
