<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('SHOW_GALLERY_NONE', 'none');
define('SHOW_GALLERY_FIRST', 'first');
define('SHOW_GALLERY_ALL', 'all');

if ( !function_exists('renderReportBlock'))
{
    /**
    * returns rendered album gallery
    * 
    * @param array $picturesArray
    * @param array $albumData
    * @return string
    */
    function renderReportBlock(Report_model $report, $addLink = false)
    {
        $reportData  = $report->getData();
        $reportAlbum = $report->getLinkedAlbum();
        $videoList   = $report->getLinkedVideos();
        $ci = & get_instance();
        if ($reportAlbum) {
            $ci->load->helper('gallery_helper');
            $gallery = renderGalleryBlock($reportAlbum, $videoList);
        } else {
            $gallery = '';
        }
        
        $template = $addLink ? 'reports/block_link' : 'reports/block';
        return $ci->load->view($template, array('report' => $reportData, 'gallery' => $gallery), true);
    }   
}

if ( !function_exists('renderReportsList')) {
    function renderReportsList(array $reportsList, $showGalleryMode, $addLink = true)
    {
        $listRendered = '';
        if (count($reportsList) > 0) {
            $ci = & get_instance();
            foreach ($reportsList as $key => $report) {
                if (!($report instanceof Report_model)) {
                    continue;
                }
                // condition check if to show gallery or not
                if (($showGalleryMode == SHOW_GALLERY_FIRST && $key == 0) || $showGalleryMode == SHOW_GALLERY_ALL) {
                    $showGallery = true;
                } else {
                    $showGallery = false;
                }
                
                if ($showGallery && $linkedAlbum = $report->getLinkedAlbum() ) {
                    $ci->load->helper('gallery_helper');
                    $gallery = renderGalleryBlock( $linkedAlbum, array(), 6 );
                } else {
                    $gallery = '';
                }
                $template = $addLink ? 'reports/block_link' : 'reports/block';
                $listRendered .= $ci->load->view(
                                            $template, 
                                            array(  
                                                'report' => $report->getData(), 
                                                'gallery' => $gallery
                                                ), 
                                            true
                                            );
            }
        }
        return $listRendered;
    }
}
