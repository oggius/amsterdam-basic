<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[name=timestamp]').datetimepicker({'dateFormat' : 'yy-mm-dd'});
    });
</script>

<div class="admincontent">    
    <h2 class="colored">Создание / редактирование новости</h2>
    <form action="/admin/news/update" method="post">
        <input type="hidden" name="id" value="<?php echo empty($data['id']) ? 0 : $data['id']?>" />
        <p class="formlabel">Название</p>
        <p><input type="text" name="title" value="<?php echo empty($data['title']) ? set_value('title') : $data['title']; ?>" /></p>

        <p class="formlabel">Короткое описание</p>
        <p><textarea name="text_short" rows="10" cols="50"><?php echo empty($data['text_short']) ? set_value('text_short') : $data['text_short']?></textarea></p>
        <script>
        CKEDITOR.replace('text_short');
        </script>

        <p class="formlabel">Полный текст</p>
        <p><textarea name="text_full" rows="10" cols="50"><?php echo empty($data['text_full']) ? set_value('text_full') : $data['text_full']?></textarea></p>
        <script>
        CKEDITOR.replace('text_full');
        </script>
        
        <p class="formlabel">Дата публикации</p>
        <p><input type="text" name="timestamp" value="<?php echo empty($data['timestamp']) ? set_value('timestamp') : $data['timestamp']?>" /></p>

        <p class="formlabel">Активность</p>
        <p><?php echo form_dropdown('is_active', array('0' => 'Нет', '1' => 'Да'), !empty($data['is_active']) ? $data['is_active'] : 0);?></p>

        <p><input type="submit" value="Сохранить" /></p>
    </form>
</div>