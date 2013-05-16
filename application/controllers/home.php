<?php
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_main');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        // load all needed models
        $this->load->model('Concerts_model', 'Concerts');
        $this->load->model('Calendar_model', 'Calendar');
        $this->load->model('News_model', 'News');
        $this->load->model('Guest_model', 'Guest');
        $this->load->model('Report_model', 'Report');
        $this->load->model('Reportmanager_model', 'ReportManager');
        $this->load->helper('report_helper');
                                                     
        $futureConcerts = $this->Concerts->getFuture(1);
        $monthes = $this->Calendar->getMonthes();
        $news = $this->News->getLatest(3);
        $newsBlock = $this->load->view('news/main_block', array('news' => $news), true);
        $feedbacks = $this->Guest->getRecords(0, 2, true);
        $feedbacksBlock = $this->load->view('guest/heading_table', array('records' => $feedbacks), true);
        // get reports
        $reports = $this->ReportManager->getLatest(0, 3);
        $reportsListHtml = renderReportsList($reports, SHOW_GALLERY_FIRST, true);
        
        $this->layout->setPartial('page_title', 'Кавер группа AmsterDam - живая музыка на корпоратив, свадьбу, юбилей и любой праздник');
        $this->layout->setPartial('page_description', 'Кавер группа AmsterDam - живая музыка для Вас: заказать музыку на корпоратив, свадьбу, юбилей и любой праздник');
        $this->layout->setPartial('page_keywords', 'живая группа, живая музыка, кавер группа, музыка на корпоратив, группа для корпоратива, живая музыка на корпоратив, кавер группа на корпоратив, AmsterDam, группа на праздник, музыка на праздник, живая музыка группа на день рождения, живая музыка группа в ресторан, живая музыка на юбилей, группа на свадьбу, живая музыка группа на свадьбу, живая музыка на свадьбу, заказ музыкантов на свадьбу, музика на свадьбу, музыка на свадьбу, музыканты на свадьбу киев, музыка на свадьбе');
        $this->layout->view(
                        'home/index', 
                        array(
                            'concerts' => $futureConcerts, 
                            'monthes' => $monthes, 
                            'newsBlock' => $newsBlock,
                            'feedbacksBlock' => $feedbacksBlock,
                            'reportsList' => $reportsListHtml
                            )
                        );
    }
}