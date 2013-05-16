<?php
class Contacts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_page_2col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $this->layout->setPartial('page_title', 'Кавер группа AmsterDam - заказ музыкантов, наши контакты');
        $this->layout->setPartial('page_description', 'Кавер группа AmsterDam - заказать выступление музыкантов в Киеве');
        $this->layout->setPartial('page_keywords', 'живая группа киев, живая музыка киев, заказать музыкантов, заказать музыкантов киев, поиск музыкантов киев');
        $this->layout->view('contacts/index');
    }
}