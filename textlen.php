<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Считалка длины текста без пробелов для Лены :)</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
</head>
<body>
<form method="POST">
<textarea style="width: 500px; height: 300px" name="text">
<?php echo isset($_POST['text']) ? $_POST['text'] : '';?>
</textarea>
<br />
<input type="submit" value="Посчитать количество знаков">
</form>
<?php if (isset($_POST['text'])) { ?>
    <?php 
        $fulllength = mb_strlen($_POST['text'], 'utf8');
        $symbollength = mb_strlen(str_replace(array("\r", "\n", " "), '', $_POST['text']), 'utf8');
    ?>
    <p>Количество знаков в тексте: <b><?php echo $fulllength?> символов</b>, количество знаков без пробелов: <b><?php echo $symbollength?> символов</b></p>
<?php }?>
</body>
</html>
