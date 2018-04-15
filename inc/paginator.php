<?php
if (isset($url)) {
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
?>
    <ul class="pagination">
        <?php if ($page == 1) { ?>
            <li class="disabled"><span>Назад</span></li>
        <?php } else { ?>
            <li><a href="<?=url($url, ['page' => $page - 1]);?>" rel="prev">Предыдущая</a></li>
        <?php } ?>

        <?php if (isset($hasNextPage) && $hasNextPage) { ?>
            <li><a href="<?=url($url, ['page' => $page + 1]);?>" rel="next">Следующая</a></li>
        <?php } else { ?>
            <li class="disabled"><span>Следующая</span></li>
        <?php } ?>
    </ul>
<?php } ?>
