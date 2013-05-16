<?php
class Gallery extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_page_1col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $this->load->model('Photo_model', 'Photo');
        $albums = $this->Photo->getAlbumsList( true );
        $this->layout->setPartial('page_title', 'Фотогалерея');
        $this->layout->setPartial('page_description', 'Фотографии с концертов группы AmsterDam, фотосеты, фотоподборка');
        $this->layout->view('gallery/index', array('albums' => $albums));
    }
    
    public function item($albumAlias)
    {
        $this->load->model('Album_model', 'Album');
        $this->Album->initByAlias($albumAlias);
        $albumData = $this->Album->getFullData();
        if (!empty($albumData) && $albumData['show_in_gallery']) {
            $this->load->helper('gallery_helper');
            $this->layout->setPartial('page_title', 'Фотоотчет ' . $albumData['name']);
            $this->layout->setPartial('page_description', strip_tags($albumData['description']));
            $this->layout->view(
                            'gallery/album', 
                            array(
                                'albumData' => $albumData, 
                                'gallery' => renderGalleryBlock($this->Album, array())
                                )
                            );            
        } else {
            show_404();
        }
    }
}