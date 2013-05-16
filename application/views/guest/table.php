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
</div>