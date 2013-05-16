<div class="admincontent">    
    <h2>Список новостей</h2>
    <?php foreach ($items as $item) { ?>
        <div class="itemAdmin">
            <h2><?php echo $item['title'];?></h2>
            <div class="news_short">
                <?php echo $item['text_short']; ?>
                <br />
            </div>
            <p style="clear:left; margin-top: 20px">
                <a class="link-edit" href="/admin/news/edit/<?php echo $item['id']?>">Редактировать</a>&nbsp;&nbsp;
                <a class="link-remove" href="/admin/news/delete/<?php echo $item['id']?>">Удалить</a>&nbsp;&nbsp;
                <?php if ($item['is_active']) {?>
                    <a class="link-block" href="/admin/news/deactivate/<?php echo $item['id']?>">Заблокировать</a>&nbsp;&nbsp;
                <?php } else { ?>
                    <a class="link-unblock" href="/admin/news/activate/<?php echo $item['id']?>">Разблокировать</a>&nbsp;&nbsp;                    
                <?php } ?>
            </p>            
        </div>
    <?php } ?>    
</div>