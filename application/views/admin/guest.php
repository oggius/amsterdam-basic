<div class="admincontent">    
    <h2>Отзывы слушателей</h2>
    <div class="recordsTable">
        <?php foreach ($guestrecords as $record) {?>
            <div class="guestrecord">
                <p class="text guestname">
                    <span class="colored"><?php echo $record['username'] ?></span>&nbsp;
                    <span class="timestamp">(<?php echo $record['time'] ?>)&nbsp;написал(а):</span>
                </p>
                <p class="text guestmessage"><?php echo str_replace(array("\r", "\n"), array('<br />', '<br />'), $record['text']) ?></p>
                <p style="clear:left; margin-top: 20px">
                <a class="link-remove" href="/admin/guest/delete/<?php echo $record['id']?>">Удалить</a>&nbsp;&nbsp;
                <?php if (!$record['is_blocked']) {?>
                    <a class="link-block" href="/admin/guest/block/<?php echo $record['id']?>">Заблокировать</a>&nbsp;&nbsp;
                <?php } else { ?>
                    <a class="link-unblock" href="/admin/guest/unblock/<?php echo $record['id']?>">Разблокировать</a>&nbsp;&nbsp;                    
                <?php } ?>
                <?php if (!$record['is_best']) {?>
                    <a class="link-approve" href="/admin/guest/approve/<?php echo $record['id']?>">Одобрить</a>&nbsp;&nbsp;
                <?php } ?>
                </p>
            </div>
        <?php } ?>
    </div>
</div>