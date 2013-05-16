<?php
class Reports extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        xdebug_break();
        $this->layout->setLayout('layout_page_1col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $this->load->model('Reportmanager_model', 'ReportManager');
        $this->load->helper('report_helper');
        $reports = $this->ReportManager->getLatest(0, 10);
        $reportsListHtml = renderReportsList($reports, SHOW_GALLERY_ALL, true);
        
        $this->layout->setPartial('page_title', 'Фото- и видеоотчеты с выступлений группы AmsterDam на праздниках, свадьбах, корпоративах, в ресторанах и пабах');
        $this->layout->setPartial('page_description', 'Фотоотчеты и видеоотчеты с выступлений кавер-группы AmsterDam на различых мероприятиях, таких как свадьба, корпоратив, банкет, день рождения, выступление в ресторане и пабе');
        $this->layout->view('reports/index', array('reportsList' => $reportsListHtml));
    }
    
    public function item($reportAlias)
    {
        $this->load->model('Report_model', 'Report');
        $this->Report->initByAlias($reportAlias);
        $this->Report->initLinkedVideo();
        if (!$this->Report->isInit()) {
            show_404();
        }
        
        $reportData = $this->Report->getData();
        $this->load->helper('report_helper');
        $reportBlock = renderReportBlock($this->Report, false);
        $this->layout->setPartial('page_title', $reportData['name'] . ' - фотоотчет с выступления');
        $this->layout->setPartial('page_description', strip_tags($reportData['description_short']));        
        $this->layout->view('reports/single_page', array('report' => $reportData, 'reportBlock' => $reportBlock));
    }
}