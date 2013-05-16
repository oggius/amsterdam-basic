<?php
class Services extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_page_1col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $this->layout->setPartial('page_title', 'Кавер группа AmsterDam - услуги профессиональных музыкантов, живая музыка на корпоратив, свадьбу, юбилей, банкет, в ресторан, паб');
        $this->layout->setPartial('page_description', 'Музыкальная кавер группа AmsterDam - живая музыка для любого праздника: на корпоратив, на свадьбу, на юбилей на день рождения');
        $this->layout->setPartial('page_keywords', 'группа для корпоратива, живая музыка на корпоратив, кавер группа на корпоратив, AmsterDam, музыка на корпоратив, группа на праздник, музыка на праздник, живая музыка группа на день рождения, живая музыка группа в ресторан, живая музыка на юбилей, группа на свадьбу, живая музыка группа на свадьбу, живая музыка на свадьбу, заказ музыкантов на свадьбу, музика на свадьбу, музыка на свадьбу, музыканты на свадьбу киев, музыка на свадьбе');
        $this->load->model('Guest_model', 'Guest');
        $records = $this->Guest->getRecords(0, 10, true);
        $recordsTable = $this->load->view('guest/heading_table', array('records' => $records), true);
        // get reports
        $this->load->model('Reportmanager_model', 'ReportManager');
        $this->load->helper('report_helper');
        $reports = $this->ReportManager->getLatest(0, 3);
        $reportsListHtml = renderReportsList($reports, SHOW_GALLERY_FIRST, true);        
        $this->layout->view('services/index', array('responsesTable' => $recordsTable, 'reportsList' => $reportsListHtml));
    }
}