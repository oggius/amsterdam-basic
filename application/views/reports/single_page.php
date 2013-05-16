<div class="single_col_content" style="float: left; width: 100%">
    <div class="content_heading" style="width: 735px">
        <div>
            <div id="vk_like"></div>
            <script type="text/javascript">
            VK.Widgets.Like("vk_like", {type: "mini", height: 20} );
            </script>
            <g:plusone size="medium"></g:plusone>
            <div class="fb-like" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="AmsterdamCover" data-lang="ru" data-text="<?php echo $report['name']?>">Твит</a>            
        </div>
        <h1><?php echo $report['name']; ?></h1>
    </div>
    <?php echo $reportBlock ?>
    <div class="gallery-back">
        <a href="/reports.html" class="link-back colored">Вернуться к отчетам</a>
    </div>
</div>
