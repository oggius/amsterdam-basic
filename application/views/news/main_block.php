    <?php if (count($news) > 0) { ?>
        <a class="headLink colored" href="/news.html"><h2 class="colored">Последние новости</h2></a>
        <?php foreach ($news as $item) { ?>
            <div class="newsItem" id="newsItem<?php echo $item['id'];?>">
                <h3><?php echo $item['title'];?></h3>
                <div class="news_short">
                    <?php echo $item['text_short']; ?>&nbsp;
                </div>
                <a class="newsMore colored" href="/news/<?php echo $item['id']?>.html">(подробнее)</a>
                <br />
                <!--<p class="newsDate"><?php echo $item['date']?></p>-->
            </div>
        <?php } ?> 
        <p class="text" style="text-align: center"><strong><a href="/news.html">Просмотреть все новости кавер-группы AmsterDam</a></strong></p>

    <?php } ?>
