<div class="admincontent">    
    <h2>Отчеты</h2>
    <?php foreach ($items as $item) { ?>
        <div class="itemAdmin">
            <h2><?php echo $item['name'];?></h2>
            <div class="news_short">
                <?php echo $item['description_short']; ?>
                <br />
            </div>
            <p style="clear:left; margin-top: 20px">
                <a class="link-edit" href="/admin/reports/edit/<?php echo $item['id']?>">Редактировать</a>&nbsp;&nbsp;
                <a class="link-remove" href="/admin/reports/delete/<?php echo $item['id']?>">Удалить</a>&nbsp;&nbsp;
            </p>            
        </div>
    <?php } ?>    
</div>