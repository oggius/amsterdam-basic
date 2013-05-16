<div>
    <h1>Последние новости</h1>
    <?php if (count($news) > 0) { ?>
    <?php foreach ($news as $item) { ?>
        <div class="newsItem" id="newsItem<?php echo $item['id'];?>">
            <h2><?php echo $item['title'];?></h2>
            <div class="news_short">
                <?php echo $item['text_short']; ?>
                <br />
                <a class="newsMore" href="/news/<?php echo $item['id']?>.html">Читать полностью</a>
            </div>
            <!--<p class="newsDate"><?php echo $item['date']?></p>-->
        </div>
    <?php } ?> 
    <?php } else { ?>
        <h2>Пока никаких новостей :)</h2>
    <?php } ?>
</div>