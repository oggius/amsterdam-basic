<script type="text/javascript">
    $(document).ready(function(){
        $('input[name=time]').datetimepicker({'dateFormat' : 'yy-mm-dd'});
    });
</script>
<div class="admincontent">    
    <h2 class="colored">Создание / редактирование концерта</h2>
    <form action="/admin/concerts/update" method="post">
        <input type="hidden" name="id" value="<?php echo empty($data['id']) ? 0 : $data['id']?>" />
        <p class="formlabel">Название</p>
        <p><input type="text" name="name" value="<?php echo empty($data['name']) ? "" : $data['name']?>" /></p>

        <p class="formlabel">Описание</p>
        <p><textarea name="description" rows="10" cols="50"><?php echo empty($data['description']) ? "" : $data['description']?></textarea></p>

        <p class="formlabel">Время</p>
        <p><input type="text" name="time" value="<?php echo empty($data['time']) ? "" : $data['time']?>" /></p>

        <p class="formlabel">Заведение</p>
        <p>
            <select name="place_id">
                <?php foreach($places as $place) {?>
                    <option value="<?php echo $place['id']?>" <?php echo (isset($data['place_id']) && $place['id'] == $data['place_id']) ? 'selected' : ''?>><?php echo $place['name']?></option>
                <?php } ?>
            </select>
        </p>
        <p><input type="submit" value="Сохранить" /></p>
    </form>
</div>