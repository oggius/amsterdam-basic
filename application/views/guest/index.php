<div class="contacts">
    <div class="content_heading">
        <div>
            <div id="vk_like"></div>
            <script type="text/javascript">
            VK.Widgets.Like("vk_like", {type: "mini", height: 20} );
            </script>
            <g:plusone size="medium"></g:plusone>
            <div class="fb-like" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="AmsterdamCover" data-lang="ru" data-text="Делитесь впечатлениями и оставляйте свои замечания в Гостевой книге группы AmsterDam">Твит</a>            
        </div>
        <h1>Гостевая</h1>
    </div>
    <p>Добро пожаловать в Гостевую книгу. Здесь Вы можете оставить отзыв о творчестве нашей кавер группы, высказать свои замечания и пожелания, а так же просто пожелать нам творческих успехов и расcказать, как вы любите живую музыку :)</p>
    <br />
    <p class="text">ВНИМАНИЕ! Сразу хотим предупредить, что все комментарии, содержащие ругательства, оскорбления, ненормативную лексику, а так же любую информацию, несовместимую со словами "культурный воспитанный человек" (экстремизм, расизм, спам, реклама, "троллинг" и прочую неотносящуюся к теме сайта ерунду) будут удалены без каких-либо предупреждений</p>
    <div class="formblock">
        <?php if ($recordsCount == 0) {?>
            <a href="javascript:void(0)" rel="nofollow" class="showguestform colored">Оставить первый отзыв</a>
        <?php } else { ?>
            <a href="javascript:void(0)" rel="nofollow" class="showguestform colored">Оставить отзыв</a>
        <?php } ?>
        <div class="guestform" style="display: none">
            <p class="gbfield"><label>Ваше имя*</label><br /><input type="text" name="guestname" value=""/></p>
            <p class="gbfield"><label>Ваш email</label><br /><input type="text" name="guestemail" value=""/></p>
            <!--<p class="gbfield"><label>А вы точно не робот?:) Ответьте на вопрос: как называется наша группа?</label><br /><input type="text" name="antispam" value=""/></p>-->
            <p class="gbfield"><label>Собственно, сам отзыв* =)</label><br /><textarea name="guestmessage"></textarea></p>
            <p><a href="javascript:void(0)" rel="nofollow" class="sendguestmessage colored">Отправить</a></p>
            <!--<p><input type="button" class="sendguestmessage colored" value="Отправить" /></p>-->
        </div>
    </div>
    <?php echo $recordsTable; ?>
    <?php if ($hasMore) {?>
    <a href="javascript:void(0)" class="loadMore">Показать больше отзывов</a>
    <?php } ?>
    <p class="text">Если Вы считаете, что какой-либо отзыв носит оскорбительный характер или хотели бы удалить отзыв, который сами оставили, пожалуйста, напишите нам на электронную почту или свяжитесь по телефонам, которые размещены в разделе <a href="/contacts.html">Контакты</a>, и мы обязательно отреагируем на Ваш запрос.</p>    
</div>