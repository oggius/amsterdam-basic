<div class="main_content_top">
    <img class="mainimg" src="/theme/images/amsterdam.jpg" alt="Кавер-группа AmsterDam" title="Кавер-группа AmsterDam" />
    <div class="main_top_right">
        <h1>Кавер группа AmsterDam</h1>
        <p class="text">Приветствуем Вас! Вы обратились по адресу, потому что мы умеем создавать незабываемую атмосферу для любого праздника, и если вы не хотите чтобы гости засыпали, то <strong>живая музыка</strong> - это то что нужно, а ее может обеспечить только <strong>"живая" группа</strong>, такая как мы - <strong>кавер группа AmsterDam</strong>. Нужны доказательства? Приходите на наш концерт и убедитесь сами!</p>
        <div style="width:310px; float: left; margin-top: 10px">
            <g:plusone size="medium"></g:plusone>
            <div class="fb-like" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial" data-lang></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="AmsterdamCover" data-lang="uk" data-text="Кавер группа AmsterDam - музыка вашего настроения! 100% живой звук, культовые хиты!">Твит</a>
            <!--
            <div class="main_social_block" style="float: left; margin-top: 5px">
                <div id="vk_like"></div>
                <script type="text/javascript">
                VK.Widgets.Like("vk_like", {type: "button", height: 20} );
                </script>
            </div>    
            -->
        </div>
        <br style="clear: both;" />
        <h3 class="heading">Ближайший концерт</h3>
        <div class="content_list">
            <?php foreach ($concerts as $concert) { ?>
                <div class="concert" id="concert<?php echo $concert['id']; ?>">
                    <p class="heading"><?php echo $concert['name'];?></p>
                    <div class="concert_description">
                        <p><img src="<?php echo (empty($concert['concert_image']) ? '/userfiles/places/' . $concert['place_image'] : '/userfiles/places/' . $concert['place_image']);?>" alt="Афиша <?php echo $concert['name']?>" width="100"/> </p>
                        <p class="text"><?php echo $concert['description'];?></p>
                    </div>
                    <p class="text">Место:&nbsp;<span class="colored"><?php echo $concert['place_name']?></span><!--&nbsp;&nbsp;(<?php /*echo $concert['address']*/ ?>)--></p>
                    <p class="text">Время:&nbsp;<span class="colored"><?php echo date('d', strtotime($concert['time'])) . ' ' . $monthes[date('m', strtotime($concert['time']))]?> в <?php echo date('H:i', strtotime($concert['time']))?></span></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="main_content_bottom">
    <div class="main_bottom_2col_wrapper">
        <div class="main_bottom_left">
            <div class="mainBlock"><?php echo $newsBlock; ?></div>
        </div>
        <div class="main_bottom_right">
            <div class="mainBlock">
                <?php echo $feedbacksBlock; ?>
                
            </div>
        </div>
    </div>
    <div class="mainBlock">
        <h2 class="colored">Последние отчеты</h2>
        <?php echo $reportsList ?>
    </div>
    <div class="mainBlock">
        <h2 class="colored">Информация</h2>
        <p class="text"><strong>Кавер-группа AmsterDam</strong> - это зажигательная живая музыка для корпоратива, на свадьбу или банкет, в ресторан или паб; это 100% живой звук, качественный саунд, невероятная волна позитива и драйва, ну и конечно же отменное настроение, которое мы спешим подарить всей аудитории. Если Вы ищите живую группу в Киеве или Украине, любите живую музыку и хотите заказать музыкантов для своего праздника, то вы обратились по адресу: <strong>кавер-группа AmsterDam</strong> - это именно то, что вам нужно! В разделе <a href="/services.html">Наши услуги</a> Вы можете ознакомиться с перечнем предоставляемых группой музыкальных услуг. </p>
        <p class="text">Кавер-группа AmsterDam имеет богатый опыт выступлений на различных праздниках, музыкальной поддержке на <strong>свадьбе</strong>, <strong>корпоративе</strong>, <strong>вечеринке</strong>, <strong>банкете</strong></a>. Мы работали и постоянно работаем с лучшими заведениями Киева и Украины, стали постоянными гостями и резидентами известных ресторанов, клубов и пабов. В <a href="/playlist.html">репертуаре</a> кавер-группы AmsterDam найдётся музыка на любой вкус, от классических хитов 70-х - 2000-х и до современных треков. Умножьте это всё на невероятную энегретику, драйв, собственные аранжировки, полностью живой звук - и вы убедитесь, что пригласив нас к себе на праздник, свадьбу или корпоратив, вы точно не прогадаете, Вы и Ваши гости останутся довольны. Мы это гарантируем!</p>
        <p class="text">Как говорится, лучше один раз увидеть, чем сто раз услышать. Ну а что может быть лучше, чем увидеть и услышать одновременно? Поэтому, приглашаем Вас ознакомиться с <a href="/schedule.html">расписанием концертов</a> и обязательно посетить выступление <strong>кавер-группы AmsterDam в Киеве</strong>.</p>
    </div>
</div>
