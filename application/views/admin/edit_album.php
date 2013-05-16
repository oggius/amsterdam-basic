<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[name=created]').datetimepicker({'dateFormat' : 'yy-mm-dd'});
    });
</script>

<div class="admincontent">    
    <h2 class="colored">Создание / редактирование альбома</h2>
    <form action="/admin/albums/update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo empty($data['id']) ? 0 : $data['id']?>" />
        <p class="formlabel">Название</p>
        <p><input type="text" name="name" value="<?php echo empty($data['name']) ? set_value('name') : $data['name']; ?>" /></p>

        <p class="formlabel">Идентификатор (используется для построения url-адреса)</p>
        <p><input type="text" name="alias" value="<?php echo empty($data['alias']) ? set_value('alias') : $data['alias']; ?>" /></p>
       
        <p class="formlabel">Описание</p>
        <p><textarea name="description" rows="10" cols="50"><?php echo empty($data['description']) ? set_value('description') : $data['description']?></textarea></p>
        <script>
        CKEDITOR.replace('description');
        </script>
        
        <p class="formlabel">Дата cоздания</p>
        <p><input type="text" name="created" value="<?php echo empty($data['created']) ? set_value('created') : $data['created']?>" /></p>

        <p class="formlabel">Показывать в галерее?</p>
        <p><?php echo form_dropdown('show_in_gallery', array('0' => 'Нет', '1' => 'Да'), !empty($data['show_in_gallery']) ? $data['show_in_gallery'] : 0);?></p>
        
        <p class="formlabel">Заглавное изображение</p>
        <?php if (!empty($data['id'])) {?>
        <p><img src="/userfiles/gallery/<?php echo $data['id']?>/title.jpg" /></p>
        <?php } ?>
        <p><input type="file" name="album_img"/></p>

        <p>
            <input type="submit" value="Сохранить" />&nbsp;&nbsp;&nbsp;
            <?php if (!empty($data['id'])) {?>
                <input type="button" value="Фотографии" onclick="location.href='/admin/albums/photos/<?php echo $data['id']; ?>'"/>
            <?php } ?>
        </p>
    </form>
</div>