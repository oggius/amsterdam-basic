<a href="/guest.html" class="headLink colored"><h2 class="colored">Отзывы о кавер группе AmsterDam</h2></a>
<div class="recordsTable">
    <?php foreach ($records as $record) {?>
        <div class="guestrecord">
            <p class="text guestname">
                <span class="colored"><?php echo $record['username'] ?></span>&nbsp;
                <span class="timestamp">(<?php echo $record['time'] ?>)&nbsp;написал(а):</span>
            </p>
            <p class="text guestmessage"><?php echo str_replace(array("\r", "\n"), array('<br />', '<br />'), $record['text']) ?></p>
        </div>
    <?php } ?>
    <p class="text" style="text-align: center"><strong><a href="/guest.html">Просмотреть все отзывы о кавер-группе AmsterDam</a></strong></p>
</div>