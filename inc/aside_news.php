<aside id="right-blockk">
    <h2>Последние новости</h2>
    <br>
    <?php
    foreach (store('lastN', 'news', 3) as $row) {
        $url = url('news/single.php', ['id' => $row['id']]);
    ?>
        <div class="kill-me">
            <h4><a href="<?=$url?>"><?=$row['head']?></a></h4>
            <p><?=mb_substr($row['post'], 0, 60)?></p>
        </div>
    <?php } ?>
</aside>
