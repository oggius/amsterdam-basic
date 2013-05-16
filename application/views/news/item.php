<div class="newsBig">
    <div class="content_heading">
        <div>
            <div id="vk_like"></div>
            <script type="text/javascript">
            VK.Widgets.Like("vk_like", {type: "mini", height: 20} );
            </script>
            <g:plusone size="medium"></g:plusone>
            <div class="fb-like" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="AmsterdamCover" data-lang="ru" data-text="<?php echo strip_tags($item->text_short); ?>">Твит</a>
        </div>
        <h1><?php echo $item->title ?></h1>
    </div>
    <div class="text"><?php echo $item->text_full;?></div>
    <p class="newsDate">Дата публикации: <?php echo $item->time;?> </p>
</div>
<div class="newsBackWrapper">
    <p class="newsBack"><a href="/news.html">Вернуться к списку новостей</a></p>
</div>
