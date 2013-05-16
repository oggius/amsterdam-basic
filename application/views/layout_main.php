<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="<?php echo $page_description; ?>" />
<meta name="keywords" content="<?php echo $page_keywords; ?>" />
<meta name="robots" content="<?php echo $index_follow; ?>">
<meta http-equiv="Cache-Control" content="public" /> 
<meta http-equiv="Cache-Control" content="max-age=<?php echo date('r', time() + 604800);?>, must-revalidate" />
<meta http-equiv="Expires" content="<?php echo date('r', time() + 604800);?>" />
<?php echo $canonical; ?>
<link rel="shortcut icon" href="/theme/images/favicon.gif">
<link href="/theme/css/styles.css" media="screen" rel="stylesheet" type="text/css" >
<link href="/theme/css/stapel.css" media="screen" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="/theme/css/lightbox.css" type="text/css" media="screen" />
<link href="/theme/css/ui-darkness/jquery-ui-1.10.0.custom.css" media="screen" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="/theme/js/main.js"></script>
<!--<script type="text/javascript" src="/theme/js/modernizr.custom.63321.js"></script>-->
<script type="text/javascript" src="/theme/js/lightbox.js"></script>
<script type="text/javascript" src="/theme/js/jquery-ui-1.10.0.custom.min.js"></script>
<script type="text/javascript" src="/theme/ext/galleria/galleria-1.2.9.min.js"></script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37064991-1']);
  _gaq.push(['_trackPageview']);
</script>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?75"></script>
<script type="text/javascript" src="http://vk.com/js/api/share.js?11"></script>
<script type="text/javascript">
  VK.init({apiId: 3361784, onlyWidgets: true});
</script>
</head>
<body>
<div id="site">
    <div id="top"></div>
    <div id="leftcol"></div>
    <div id="centercol_onecol">
        <div class="header">
            <div class="logo"><a href="/" title="Кавер группа AmsterDam"><img src="/theme/images/logo.png" alt="Кавер Группа AmsterDam" title="Кавер Группа AmsterDam"></a></div>
            <?php echo $main_menu; ?>
            <div class="order">
                <a href="/order.html">Заказать выступление</a>
            </div>            
        </div>
        <div class="content_wrapper_main">
        <?php echo $content_for_layout; ?>            
        </div>
    </div>
    <div id="rightcol"></div>
    <div id="bottom_dark"></div>
</div> 
<script type="text/javascript">
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>  
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_EN/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</body>
</html>