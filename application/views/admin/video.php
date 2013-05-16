<div class="admincontent">    
    <h2>Видео</h2>
    <?php foreach ($items as $item) { ?>
        <div class="itemAdmin">
            <h2><?php echo $item['title'];?></h2>
            <div class="news_short">
                <?php echo $item['description']; ?>
                <br />
            </div>
            <div class="video">
                <iframe width="560" height="315" src="<?php echo $item['embeded_code'] ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <p style="clear:left; margin-top: 20px">
                <a class="link-edit" href="/admin/video/edit/<?php echo $item['id']?>">Редактировать</a>&nbsp;&nbsp;
                <a class="link-remove" href="/admin/video/delete/<?php echo $item['id']?>">Удалить</a>&nbsp;&nbsp;
                <?php if ($item['is_hidden']) { ?> 
                    <a class="link-unblock" href="/admin/video/unblock/<?php echo $item['id']?>">Отображать</a>&nbsp;&nbsp;                    
                <?php } else {?>
                    <a class="link-block" href="/admin/video/block/<?php echo $item['id']?>">Скрыть</a>&nbsp;&nbsp;                    
                <?php } ?>
            </p>            
        </div>
    <?php } ?>    
</div>