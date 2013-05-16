<?php
class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_page_2col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }

    public function index()
    {
        $this->layout->setPartial('page_title', 'Информация о группе');
        $this->layout->setPartial('page_description', 'Общая информация, немного истории, а также состав группы AmsterDam');
        $this->layout->view('about/index');
    }
}