<?php
class Adminlogin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->setLayout('layout_admin');
        $this->load->model('User_model');
    }
    
    public function index()
    {
        $messages = array();
        // check if there
        if ($pass = $this->input->post('adminpass')) {
            if ($this->User_model->login($pass)) {
                header('Location: /admin');
                exit();
            } else {                
                $messages[] = "Wrong password. Try again";
            }
        }
        $this->layout->view('admin/loginform', array('messages' => $messages));        
    }
    
    public function logout()
    {
        $this->User_model->logout();
        header('Location: /admin/login');
    }
}