<?php
class Adminhome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if (!$this->User_model->isLogged()) {
            header('Location: /admin/login');
            exit();
        }
        $this->load->library('layout');
        $this->layout->setLayout('layout_admin');
    }
    
    public function index()
    {
        $this->layout->view('admin/home');
    }
}