<script type="text/javascript" src="/theme/ext/cloud-carousel.1.0.5.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#albums").CloudCarousel(		
            {			
                reflHeight:70,
				reflOpacity:0.5,
				reflGap:0,            
                xPos: 350,
                yPos: 100,
                buttonLeft: $("#left-but"),
                buttonRight: $("#right-but"),
                altBox: $("#alt-text"),
                titleBox: $("#title-text")
            }
        );
    })
</script>
<div>
    <div class="content_heading" style="width: 735px">
        <div>
            <div id="vk_like"></div>
            <script type="text/javascript">
            VK.Widgets.Like("vk_like", {type: "mini", height: 20} );
            </script>
            <g:plusone size="medium"></g:plusone>
            <div class="fb-like" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="AmsterdamCover" data-url="http://www.amsterdam-band.com/gallery.html" data-lang="ru" data-text="В галерее кавер-группы AmsterDam много живых фотографий с концертов, свадеб и корпоративов">Твит</a>            
        </div>
        <h1>Фотогалерея</h1>
    </div>
    <div class="single_col_content">
    <p class="text" style="width: 735px">На этой странице представлены фотоотчеты по наиболее ярким концертам живой группы AmsterDam. По мере поступления фотографий от наших друзей и гостей, мы будем расширять данный список фотографий. Кстати, мы с удовольствием публикуем фотографии не только профессиональных фотографов, но и любительские снимки наших гостей, поэтому если Вы любите и умеете фотографировать, то приходите на <a href="/schedule.html">ближайший концерт</a> нашей группы в Киеве - и возможно именно Ваши снимки украсят нашу коллекцию в ближайшем будущем! ;)</p>	
        <div class="gallery">
            <div id="albums" style="width:700px; height:550px;background:#000;overflow:scroll;">
            <!-- Define elements to accept the alt and title text from the images. -->
            <p id="alt-text" class="colored"></p>             
            <p id="title-text" class="colored"></p>             
                <?php foreach ($albums as $album) { ?>
                <a href="/gallery/<?php echo $album['alias']; ?>.html">
                    <img class="cloudcarousel" src="<?php echo !empty($album['img_src']) ? $album['img_scr'] : '/userfiles/gallery/' . $album['id'] . '/title.jpg';?>" alt="<?php echo $album['name']; ?>">
                </a>                
                <?php } ?>
            </div>
            <a id="left-but" href="javascript:void(0)" rel="nofollow"></a>
            <a id="right-but" href="javascript:void(0)" rel="nofollow"></a>
        </div>
    </div>
</div>