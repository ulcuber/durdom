<?php
require_once '../../inc/bootstrap.php';
redirectNotAdmin();

if (!isset($_REQUEST['id'])) {
    $_SESSION['error'] = 'Не задан id';
    back();
    exit();
}
$id = (int) $_REQUEST['id'];
$item = store('byId', 'reviews', $id);
if (!$item) {
    $_SESSION['error'] = 'Обзор не найден';
    back();
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
                        <div class="panel-heading">Редактировать обзор #<?=$item['id']?></div>

<form class="form-horizontal"
    method="POST"
    action="<?=url('admin/reviews/update.php')?>"
    enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$item['id']?>">
    <div class="panel-body">
        <div class="form-group">
            <label for="head" class="col-md-3 control-label">Заголовок</label>
            <div class="col-md-9">
                <input id="head" type="text" class="form-control" name="head" value="<?=$item['head']?>" value="<?=$item['head']?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="imghead" class="col-md-3 control-label">Превью (если не выбрать, останется старое)</label>
            <div class="col-md-3">
                <input id="imghead" type="file" name="imghead">
            </div>
            <label class="col-md-3 control-label">Текущее превью</label>
            <div class="col-md-3">
                <img class="img-responsive" src="<?=url('images/reviews/' . $item['imghead'])?>" alt="<?=$item['head']?>">
            </div>
        </div>
        <div class="form-group">
            <label for="post" class="col-md-3 control-label">Первая половина</label>
            <div class="col-md-9">
                <textarea id="post" name="post" class="form-control" rows="6" required><?=$item['post']?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="img" class="col-md-3 control-label">Первая картинка (если не выбрать, останется старая)</label>
            <div class="col-md-3">
                <input id="img" type="file" name="img" value="<?=$item['img']?>">
            </div>
            <label class="col-md-3 control-label">Текущая картинка</label>
            <div class="col-md-3">
                <img class="img-responsive" src="<?=url('images/reviews/' . $item['img'])?>" alt="<?=$item['head']?>">
            </div>
        </div>
        <div class="form-group">
            <label for="post2" class="col-md-3 control-label">Вторая половина</label>
            <div class="col-md-9">
                <textarea id="post2" name="post2" class="form-control" rows="6" required><?=$item['post2']?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="img2" class="col-md-3 control-label">Вторая картинка</label>
            <div class="col-md-3">
                <input id="img2" type="file" name="img2" value="<?=$item['img2']?>">
            </div>
            <label class="col-md-3 control-label">Текущая картинка</label>
            <div class="col-md-3">
                <img class="img-responsive" src="<?=url('images/reviews/' . $item['img2'])?>" alt="<?=$item['head']?>">
            </div>
        </div>
        <div class="form-group">
            <label for="author" class="col-md-3 control-label">Автор</label>
            <div class="col-md-9">
                <input id="author" type="text" class="form-control" name="author" value="<?=$item['author']?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="video" class="col-md-3 control-label">Видео</label>
            <div class="col-md-9">
                <input id="video" type="text" class="form-control" name="video" value="<?=$item['video']?>">
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
