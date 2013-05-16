<div class="report_content">
    <h2><a class="link-no-underline" href="/reports/<?php echo $report['alias']?>.html"><?php echo $report['name']?></a></h2>
    <div class="text">
        <?php echo $report['description'] ?>
    </div>	
    <?php echo $gallery ?>
    <p class="more">
        <a class="colored" href="/reports/<?php echo $report['alias']?>.html">
            <?php echo !empty($gallery) ? 'Посмотреть остальные фото/видео' : 'Посмотреть полный отчет'; ?>
        </a>
    </p>
</div>
