<aside id="right-blockk">
    <h2>Последние обзоры</h2>
    <br>
    <?php
    foreach (store('lastN', 'reviews', 3) as $row) {
        $url = url('reviews/single.php', ['id' => $row['id']]);
    ?>
        <div class="kill-me">
            <h4><a href="<?=$url?>"><?=$row['head']?></a></h4>
            <p><?=mb_substr($row['post'], 0, 60)?></p>
        </div>
    <?php } ?>
</aside>
