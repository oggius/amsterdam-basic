<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('renderGalleryBlock'))
{
    /**
    * returns rendered album gallery
    * 
    * @param array $picturesArray
    * @param array $albumData
    * @return string
    */
    function renderGalleryBlock(Album_model $album, array $videoList, $limit = 0)
    {
        $picturesArray = $album->getPhotos();
        $albumData = $album->getAlbumData();        
        $videoListFinal = array();
        if (is_array($videoList) && count($videoList) > 0) {
            foreach ($videoList as $key => $video) {
                $videoData = $video->getData();
                $videoListFinal[$videoData['id']] = $videoData;
            }
        }
        
        $ci = & get_instance();
        $galleryHtml = $ci->load->view(
                                    'gallery/gallery', 
                                    array(
                                        'photos' => $picturesArray, 
                                        'videos' => $videoListFinal,
                                        'albumData' => $albumData,
                                        'galleryId' => 'gallery' . $albumData['id'],
                                        'limitPictures' => $limit
                                    ), 
                                    true
                                  );
                
        return !empty($galleryHtml) ? $galleryHtml : '';
    }   
}
