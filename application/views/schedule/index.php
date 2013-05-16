<div>
    <div class="content_heading">
        <div>
            <div id="vk_like"></div>
            <script type="text/javascript">
            VK.Widgets.Like("vk_like", {type: "mini", height: 20} );
            </script>
            <g:plusone size="medium"></g:plusone>
            <div class="fb-like" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="AmsterdamCover" data-lang="ru" data-text="Расписание ближайших концертов кавер-группы AmsterDam">Твит</a>
        </div>
        <h1>Предстоящие концерты</h1>
    </div>
    <div class="single_col_content">
        <p class="text">Приглашаем всех ознакомиться с расписанием ближайших концертов кавер группы Amsterdmam в ресторанах и пабах Киева и Украины. Живая музыка на корпоративе, свадьбе или банкете в нашем исполнении в данном разделе не анонсируется, так как такие мероприятия имеют в большинстве своём закрытый характер.</p>
        <p class="text">Друзья, если вы побывали на одном из наших концертов и у вас есть эмоции или критика, которыми вы хотели бы поделиться, приглашаем вас в нашу <a href="/guest.html">Гостевую книгу</a>, где вы можете свободно высказаться о творчестве нашей группы. Будем рады любым мнениям и отзывам!</p>
        <div class="content_list" style="margin-top: 20px">
            <?php foreach ($concerts as $concert) { ?>
                <div class="concert" id="concert<?php echo $concert['id']; ?>">
                    <p class="heading"><?php echo $concert['name'];?></p>
                    <div class="concertContent">
                        <img src="<?php echo (empty($concert['concert_image']) ? '/userfiles/places/' . $concert['place_image'] : '/userfiles/places/' . $concert['place_image']);?>" alt="Афиша <?php echo $concert['name']?>" width="100"/>
                        <div class="concertText">
                            <p class="text"><?php echo $concert['description'];?></p>
                            <p class="text">Место:&nbsp;<span class="colored"><?php echo $concert['place_name']?></span>&nbsp;&nbsp;(<?php echo $concert['address'] ?>)</p>
                            <p class="text">Время:&nbsp;<span class="colored"><?php echo date('d', strtotime($concert['time'])) . ' ' . $monthes[date('m', strtotime($concert['time']))]?> в <?php echo date('H:i', strtotime($concert['time']))?></span></p>
                            <div class="shareBlock">
                            </div>                            
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>