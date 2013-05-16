<?php
class Schedule extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_page_1col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $this->load->model('Concerts_model', 'Concerts');
        $futureConcerts = $this->Concerts->getFuture();
        $this->load->model('Calendar_model', 'Calendar');
        $months = $this->Calendar->getMonthes();
        $this->layout->setPartial('page_title', 'Ближайшие концерты');
        $this->layout->setPartial('page_description', 'Расписание выступлений группы AmsterDam на ближайшее время');
        $this->layout->view('schedule/index', array('concerts' => $futureConcerts, 'months' => $months));
    }
}