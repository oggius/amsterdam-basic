<div class="admincontent">    
    <h2>Список концертов</h2>
    <?php foreach ($concerts as $concert) { ?>
        <div class="concert" id="concert<?php echo $concert['id']; ?>">
            <p class="heading"><?php echo $concert['name'];?></p>
            <div class="concertContent">
                <img src="<?php echo (empty($concert['concert_image']) ? '/userfiles/places/' . $concert['place_image'] : '/userfiles/places/' . $concert['place_image']);?>" alt="Афиша <?php echo $concert['name']?>" width="100"/>
                <div class="concertText">
                    <p class="text"><?php echo $concert['description'];?></p>
                    <p class="text">Место:&nbsp;<span class="colored"><?php echo $concert['place_name']?></span>&nbsp;&nbsp;(<?php echo $concert['address'] ?>)</p>
                    <p class="text">Время:&nbsp;<span class="colored"><?php echo date('d', strtotime($concert['time'])) . ' ' . $monthes[date('m', strtotime($concert['time']))]?> в <?php echo date('H:i', strtotime($concert['time']))?></span></p>
                </div>
            </div>
            <p style="clear:left; margin-top: 20px">
            <a href="/admin/concerts/edit/<?php echo $concert['id']?>">Редактировать</a>&nbsp;&nbsp;
            <a class="link-remove" href="/admin/concerts/delete/<?php echo $concert['id']?>">Удалить</a>&nbsp;&nbsp;                        
            </p>
        </div>
    <?php } ?>    
</div>