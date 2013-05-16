<?php
class Playlist extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_page_1col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $this->load->model('Playlist_model', 'Playlist');
        $playlist = $this->Playlist->getListGrouped();
        
        $this->layout->setPartial('page_title', 'Репертуар группы. Полный список исполняемых хитов');
        $this->layout->setPartial('page_description', 'Полный репертуар хитов, исполняемых группой AmsterDam');
        $this->layout->view('playlist/index', array('songs' => $playlist));
    }
}