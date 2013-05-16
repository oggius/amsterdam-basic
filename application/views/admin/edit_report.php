<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[name=created]').datetimepicker({'dateFormat' : 'yy-mm-dd'});
    });
</script>
<div class="admincontent">    
    <h2 class="colored">Создание / редактирование отчета</h2>
    <form action="/admin/reports/update" method="post">
        <input type="hidden" name="id" value="<?php echo empty($data['id']) ? 0 : $data['id']?>" />
        <p class="formlabel">Название</p>
        <p><input type="text" name="name" value="<?php echo empty($data['name']) ? set_value('name') : $data['name']; ?>" /></p>

        <p class="formlabel">Идентификатор (используется для построение url-адреса)</p>
        <p><input type="text" name="alias" value="<?php echo empty($data['alias']) ? set_value('alias') : $data['alias']; ?>" /></p>
        
        <p class="formlabel">Короткое описание</p>
        <p><textarea name="description_short" rows="10" cols="50"><?php echo empty($data['description_short']) ? set_value('description_short') : $data['description_short']?></textarea></p>
        <script>
        CKEDITOR.replace('description_short');
        </script>

        <p class="formlabel">Полный текст</p>
        <p><textarea name="description" rows="10" cols="50"><?php echo empty($data['description']) ? set_value('description') : $data['description']?></textarea></p>
        <script>
        CKEDITOR.replace('description');
        </script>
        
        <p class="formlabel">Дата публикации</p>
        <p><input type="text" name="created" value="<?php echo empty($data['created']) ? set_value('created') : $data['created']?>" /></p>

        <p class="formlabel">Связанный фотоальбом</p>
        <p><?php echo form_dropdown('album_id', (array(0 => 'Не связывать') +  $albums), !empty($data['album_id']) ? $data['album_id'] : 0);?></p>

        <p><input type="submit" value="Сохранить" /></p>
    </form>
</div>