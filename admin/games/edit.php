<?php
require_once '../../inc/bootstrap.php';
if (!auth()->admin()) {
    exit();
}

if (!isset($_REQUEST['id'])) {
    $_SESSION['error'] = 'Не задан id';
    exit();
}
$id = (int) $_REQUEST['id'];
$game = store('byId', 'games', $id);
if (!$game) {
    $_SESSION['error'] = 'Игра не найдена';
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Редактировать</title>
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
                        <div class="panel-heading">Редактировать игру #<?=$game['id']?></div>

<form class="form-horizontal"
    method="POST"
    action="<?=url('admin/games/update.php')?>"
    enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$game['id']?>">
    <div class="panel-body">
        <div class="form-group">
            <label for="game" class="col-md-3 control-label">Название</label>
            <div class="col-md-9">
                <input id="game" type="text" class="form-control" name="game" value="<?=$game['game']?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="info" class="col-md-3 control-label">Описание</label>
            <div class="col-md-9">
                <textarea id="info" name="info" class="form-control" rows="6" required><?=$game['info']?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="img" class="col-md-3 control-label">Картинка (если не выбрать, останется старая)</label>
            <div class="col-md-3">
                <input id="img" type="file" name="img">
            </div>

            <label class="col-md-3 control-label">Текущая картинка</label>
            <div class="col-md-3">
                <img class="img-responsive" src="<?=url('images/games/' . $game['img'])?>" alt="<?=$game['game']?>">
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
