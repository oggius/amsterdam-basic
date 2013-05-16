<?php $objectsCounter = 0;?>
<div id="<?php echo $galleryId; ?>" class="photoGallery">
    <?php if (count($videos) > 0) {
        foreach($videos as $video) {
            $objectCounter ++; ?>
            <a href="<?php echo $video['view_code'];?>"><img src="/userfiles/gallery/videothumbs/youtube-play-video.jpg" /></a>
        <?php }
        }
        foreach ($photos as $key => $photo) {
            if ($limitPictures > 0 && $key >= $limitPictures) {
                break;
            } ?>
        <a href="<?php echo $photo['src']; ?>">
            <img 
                src="<?php echo $photo['src_thmb']; ?>",
                data-big="<?php echo $photo['src']; ?>"
                data-title="<?php echo $photo['title']; ?>"
                data-description="<?php echo $photo['description']?>"
                >
        </a>                
    <?php } ?>           
</div>
<script>
// Load the classic theme
Galleria.loadTheme('/theme/ext/galleria/themes/classic/galleria.classic.min.js');
// Initialize Galleria
Galleria.run('#<?php echo $galleryId; ?>');
</script>
