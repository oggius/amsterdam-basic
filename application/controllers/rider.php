<?php
class Rider extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_page_1col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $this->layout->setPartial('page_title', 'Технический и бытовой райдеры группы');
        $this->layout->setPartial('page_description', 'Технический и бытовой райдеры группы AmsterDam. Райдер обычно составляется и предоставляется организаторам выступления для того, чтобы однозначно определить требования к техническому оснащению сцены, а так же заранее оговорить все бытовые моменты сотрудничества с группой');
        $this->layout->view('rider/index');
    }
}