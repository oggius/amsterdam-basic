<div>
    <div class="content_heading">
        <div>
            <div id="vk_like"></div>
            <script type="text/javascript">
            VK.Widgets.Like("vk_like", {type: "mini", height: 20} );
            </script>
            <g:plusone size="medium"></g:plusone>
            <div class="fb-like" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="AmsterdamCover" data-lang="ru" data-text="Репертуар кавер группы AmsterDam состоит только из хитов, от 60-х и до наших дней!">Твит</a>
        </div>
        <h1>Репертуар группы</h1>
    </div>
    <div class="single_col_content">
        <div class="content_list">
        <table class="playlist">
        <tr valign="top">
            <?php foreach ($songs as $type) { ?>
            <td>
                <p class="colored"><?php echo $type['type']?></p>
                <ul>
                    <?php foreach ($type['songs'] as $song) { ?>
                        <li><?php echo (!empty($song['author']) ? $song['author'] . '&nbsp;&nbsp;-&nbsp;&nbsp;' : '') . $song['title'] . '</b>&nbsp;&nbsp;'?></li>
                    <?php } ?>
                </ul>
            </td>
            <?php } ?>
        </tr>
        </table>
        <p class="text">Также, если Вам более удобно, Вы можете <a href="/userfiles/playlist_AmsterDam.doc" title="Скачать репертуар в формате .doc">скачать репертуар</a> группы в формате .doc</p>
        <a class="colored" href="/userfiles/playlist_AmsterDam.doc" title="Скачать репертуар в формате .doc"><img style="position: relative; top: 12px; right: 5px" src="/theme/images/word_icon.png" alt="Скачать репертуар в формате .doc" title="Скачать репертуар в формате .doc" />Скачать репертуар в формате .doc</a>
        <br />
        <br />
        <p class="text"><u>ПРИМЕЧАНИЕ:</u> По желанию клиента репертуар может быть индивидуально расширен</p>
        <p class="text">Дорогие друзья, хотели бы обратить Ваше внимание на то, что зачастую существенные обновления репертуара группы освещаются в <a href="/news.html">новостях сайта</a>, поэтому следите за нашими обновлениями, чтобы оставаться в курсе событий!</p>
        </div>
    </div>
</div>