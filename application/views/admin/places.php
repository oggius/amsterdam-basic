<div class="admincontent">    
    <h2>Список заведений</h2>
    <?php foreach ($places as $place) { ?>
        <div class="concert" id="concert<?php echo $place['id']; ?>">
            <p class="heading"><?php echo $place['name'];?></p>
            <div class="concertContent">
                <img src="<?php echo (empty($place['image']) ? '/userfiles/places/no_image.jpg' : '/userfiles/places/' . $place['image']);?>" width="100"/>
                <div class="concertText">
                    <p class="text">Адрес: &nbsp;<span class="colored"><?php echo $place['address'];?></span></p>
                    <p class="text">Телефон:&nbsp;<span class="colored"><?php echo $place['contacts'];?></span></p>
                    <p class="text">Вебсайт:&nbsp;<span class="colored"><?php echo $place['website'];?></span></p>
                </div>
            </div>
            <p style="clear:left; margin-top: 20px">
            <a href="/admin/places/edit/<?php echo $place['id']?>">Редактировать</a>&nbsp;&nbsp;
            <a class="link-remove" href="/admin/places/delete/<?php echo $place['id']?>">Удалить</a>&nbsp;&nbsp;                        
            </p>
        </div>
    <?php } ?>    
</div>