<div class="admincontent">    
    <h2 class="colored">Создание / редактирование заведения</h2>
    <form action="/admin/places/edit" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo empty($data['id']) ? 0 : $data['id']?>" />
        <p class="formlabel">Название</p>
        <p><input type="text" name="name" value="<?php echo empty($data['name']) ? set_value('name') : $data['name']; ?>" /></p>

        <p class="formlabel">Описание</p>
        <p><textarea name="description" rows="10" cols="50"><?php echo empty($data['description']) ? set_value('description') : $data['description']?></textarea></p>

        <p class="formlabel">Адрес</p>
        <p><input type="text" name="address" value="<?php echo empty($data['address']) ? set_value('address') : $data['address']?>" /></p>

        <p class="formlabel">Контакты</p>
        <p><input type="text" name="contacts" value="<?php echo empty($data['contacts']) ? set_value('contacts') : $data['contacts']?>" /></p>

        <p class="formlabel">Весбайт</p>
        <p><input type="text" name="website" value="<?php echo empty($data['website']) ? set_value('website') : $data['website']?>" /></p>

        <p class="formlabel">Изображение</p>
        <p><img src="<?php echo (empty($data['image']) ? '/userfiles/places/no_image.gif' : '/userfiles/places/' . $data['image']);?>" width="100"/></p>            
        <p><input type="file" name="place_image" /></p>
        
        <p><input type="submit" value="Сохранить" /></p>
    </form>
</div>