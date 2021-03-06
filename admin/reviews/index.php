<?php
require_once '../../inc/bootstrap.php';
redirectNotAdmin();
$url = 'admin/reviews';
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
$reviews = store('forPage', 'reviews', $page);
$hasNextPage = store()->hasPage('reviews', $page + 1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Админка | Новости</title>
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
                    <div class="error">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                        }
                        ?>
                    </div>
                    <div class="panel panel-default table-responsive">
                        <div class="panel-heading">Новости
                            <a
                                class="btn btn-xs btn-success pull-right"
                                href="<?=url('admin/reviews/create.php')?>">
                                Создать
                            </a>
                        </div>

<table class="table table-condensed table-striped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Заголовок</th>
            <th class="text-right">Действия</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($reviews as $row) { ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['head']?></td>
                <td class="text-right">
                    <a
                        class="btn btn-xs btn-info"
                        href="<?=url('admin/reviews/edit.php', ['id' => $row['id']])?>">
                        Редактировать
                    </a>

                    <form action="<?=url('admin/reviews/delete.php', ['id' => $row['id']])?>"
                        method="POST"
                        style="display: inline;"
                        onsubmit="if(confirm('Удалить? Вы уверены?')) {return true;} else {return false;};">
                        <button type="submit" class="btn btn-xs btn-danger">
                            Удалить
                        </button>
                    </form>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

                    </div>
                    <?php include ROOT_DIR . '/inc/paginator.php'; ?>
                </div>
            </div>
        </div>

    </div>
    <script src="<?=url('js/jquery.min.js');?>"></script>
    <script src="<?=url('js/bootstrap.min.js');?>"></script>
</body>
</html>
