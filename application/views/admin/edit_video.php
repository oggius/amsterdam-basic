<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<div class="admincontent">    
    <h2 class="colored">Создание / редактирование видео</h2>
    <form action="/admin/video/update" method="post">
        <input type="hidden" name="id" value="<?php echo empty($data['id']) ? 0 : $data['id']?>" />
        <p class="formlabel">Название</p>
        <p><input type="text" name="title" value="<?php echo empty($data['title']) ? set_value('title') : $data['title']; ?>" /></p>

        <p class="formlabel">Описание</p>
        <p><textarea name="description" rows="10" cols="50"><?php echo empty($data['description']) ? set_value('description') : $data['description']?></textarea></p>
        <script>
        CKEDITOR.replace('description');
        </script>
        
        <p class="formlabel">Код для просмотра (обычно, такого формата: http://www.youtube.com/watch?v={код_видео})</p>
        <p><input type="text" name="view_code" value="<?php echo empty($data['view_code']) ? set_value('view_code') : $data['view_code']?>" /></p>

        <p class="formlabel">Код для вставки (обычно, такого формата: http://www.youtube.com/embed/{код_видео})</p>
        <p><input type="text" name="embeded_code" value="<?php echo empty($data['embeded_code']) ? set_value('embeded_code') : $data['embeded_code']?>" /></p>

        <p class="formlabel">Скрыть?</p>
        <p><?php echo form_dropdown('is_hidden', array('0' => 'Нет', '1' => 'Да'), !empty($data['is_hidden']) ? $data['is_hidden'] : 0);?></p>

        <p class="formlabel">Связать с отчетом</p>
        <p><?php echo form_dropdown('report_id', (array('0' => 'Не связывать') + $reports), !empty($data['report_id']) ? $data['report_id'] : 0);?></p>
        
        <p><input type="submit" value="Сохранить" /></p>
    </form>
</div>