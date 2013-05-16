<?php
class Adminguest extends CI_Controller {

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
        $this->load->model('Guest_model', 'Guest');
        $this->load->helper('form');
    }
    
    public function index()
    {
        $guestrecords = $this->Guest->getRecordsAll();
        
        $this->layout->view('admin/guest', array('guestrecords' => $guestrecords));
    }
    
    public function delete($recordId) 
    {
        $this->Guest->delete($recordId);
        header("Location: /admin/guest");
    }
    
    public function block($recordId) 
    {
        $this->Guest->block($recordId);
        header("Location: /admin/guest");
    }

    public function unblock($recordId) 
    {
        $this->Guest->unblock($recordId);
        header("Location: /admin/guest");
    }

    public function approve($recordId) 
    {
        $this->Guest->approve($recordId);
        header("Location: /admin/guest");
    }
    
}