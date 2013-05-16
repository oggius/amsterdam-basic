<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="<?php echo $page_description; ?>" />
<meta name="robots" content="noindex, nofollow">
<link rel="shortcut icon" href="/theme/images/favicon.gif">
<link href="/theme/css/styles.css" media="screen" rel="stylesheet" type="text/css" >
<link href="/theme/css/ui-darkness/jquery-ui-1.10.0.custom.css" media="screen" rel="stylesheet" type="text/css" >
<link href="/theme/css/ui-lightness/jquery-ui-1.10.2.custom.css" media="screen" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="/theme/js/jquery-ui-1.10.0.custom.min.js"></script>
<script type="text/javascript" src="/theme/js/jquery-ui-datepicker.js"></script>
<script type="text/javascript" src="/theme/js/timepicker.js"></script>
<style>

</style>
</head>
<body>
<div id="site">
    <div id="top"></div>
    <div id="leftcol"></div>
    <div id="centercol_onecol">
        <div class="header">
            <p class="admintitle colored">Администрирование</p>
            <div class="logo"><a href="/" title="Кавер группа AmsterDam"><img src="/theme/images/logo.png" alt="Кавер Группа AmsterDam" title="Кавер Группа AmsterDam"></a></div>
        </div>
        <ul class="adminmenu">
            <li><a href="/admin/concerts">Концерты</a></li>
            <li><a href="/admin/places">Заведения</a></li>                
            <li><a href="/admin/guest">Гостевая</a></li>                
            <li><a href="/admin/albums">Альбомы</a></li>
            <li><a href="/admin/reports">Отчеты</a></li>
            <li><a href="/admin/news">Новости</a></li>            
            <li><a href="/admin/playlist">Репертуар</a></li>            
            <li><a href="/admin/video">Видео</a></li>            
            <li><a href="/admin/login/logout">Выход</a></li>
        </ul>        
        <div class="content_wrapper">
        <?php echo $content_for_layout; ?>            
        </div>
    </div>
    <div id="rightcol"></div>
    <div id="bottom_dark"></div>
</div> 
</body>
</html>