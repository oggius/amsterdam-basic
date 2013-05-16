<div class="admincontent">    
    <h2 class="colored">Создание / редактирование песни</h2>
    <form action="/admin/playlist/update" method="post">
        <input type="hidden" name="id" value="<?php echo empty($data['id']) ? 0 : $data['id']?>" />
        <p class="formlabel">Автор</p>
        <p><input type="text" name="author_name" value="<?php echo empty($data['author_name']) ? set_value('author_name') : $data['author_name']; ?>" /></p>

        <p class="formlabel">Название песни</p>
        <p><input type="text" name="song_name" value="<?php echo empty($data['song_name']) ? set_value('song_name') : $data['song_name']; ?>" /></p>
        
        <p class="formlabel">Тип</p>
        <p><?php echo form_dropdown('type_id', $types, !empty($data['type_id']) ? $data['type_id'] : 0);?></p>
        
        <p>
            <input type="submit" value="Сохранить" />&nbsp;&nbsp;&nbsp;&nbsp;
            <?php if (!empty($data['id'])) {?>
                <input type="button" value="Удалить" onclick="location.href = '/admin/playlist/delete/<?php echo $data['id'];?>'"/>&nbsp;&nbsp;&nbsp;&nbsp;              
            <?php } ?>
        </p>
    </form>
</div>