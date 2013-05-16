<?php
class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_page_2col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $this->layout->setPartial('page_title', 'Заказ выстпуления');
        $this->layout->setPartial('page_description', 'Заказ выступления группы AmsterDam на корпоратив, свадьбу, ивент по телефону, через онлайн-форму или по email');
        $this->layout->view('order/index');
    }
}