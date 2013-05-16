<div>
    <div class="content_heading">
        <div>
            <div id="vk_like"></div>
            <script type="text/javascript">
            VK.Widgets.Like("vk_like", {type: "mini", height: 20} );
            </script>
            <g:plusone size="medium"></g:plusone>
            <div class="fb-like" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="AmsterdamCover" data-lang="ru" data-text="Ознакомьтесь с промо-видео кавер группы AmsterDam, а также записями с других концеров">Твит</a>
        </div>
        <h1>Видео и аудио</h1>
    </div>
    <div class="single_col_content">
        <?php foreach ($videoList as $video) {?>
            <h2 class="colored"><?php echo $video['title'];?></h2>
            <div class="text"><?php echo $video['description'] ?></div>
            <div class="video">
                <iframe width="560" height="315" src="<?php echo $video['embeded_code'] ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <?php } ?>       
        <p class="text">Хотим заметить, что на данных видеоматериалах представлена лишь небольшая часть нашего репертуара, который за время существования группы AmsterDam разросся довольно существенно. Можете убедиться в этом сами, на странице <a href="http://www.amsterdam-band.com/playlist.html">плейлист</a> представлен полный репертуар кавер-группы AmsterDam, и он постоянно расширяется.</p>
    </div>
</div>