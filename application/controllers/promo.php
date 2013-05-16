<?php
class Promo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_page_1col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $this->load->model('videomanager_model', 'Videomanager');
        $videoList = $this->Videomanager->getList(0, 20);
        
        $this->layout->setPartial('page_title', 'Видео- и аудиозаписи группы AmsterDam');
        $this->layout->setPartial('page_description', 'Промо-видео, аудио-демо, а так же видеозаписи с живых выступлений группы AmsterDam');
        $this->layout->view('promo/index', array('videoList' => $videoList));
    }
}