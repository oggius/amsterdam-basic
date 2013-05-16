<?php
class Adminconcerts extends CI_Controller {

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
        $this->load->model('Concerts_model', 'Concerts');
    }
    
    public function index()
    {
        $futureConcerts = $this->Concerts->getFuture();
        $this->load->model('Calendar_model', 'Calendar');
        $monthes = $this->Calendar->getMonthes();        
        
        $this->layout->view('admin/concerts', array('concerts' => $futureConcerts, 'monthes' => $monthes));
    }
    
    public function edit($concertId)
    {
        $concertData = $this->Concerts->get($concertId);
        $this->load->model('Places_model');
        $this->layout->view(
                        'admin/edit_concert', 
                        array(
                            'data' => $concertData, 
                            'places' => $this->Places_model->getList()
                            )
                        );
    }
    
    public function create()
    {
        $this->load->model('Places_model');
        $this->layout->view(
                        'admin/edit_concert', 
                        array(
                            'data' => array(), 
                            'places' => $this->Places_model->getList()
                            )
                        );        
    }
    
    public function update()
    {
        if ($this->input->post('id')) {
            $this->Concerts->update( $this->input->post() );
        } else {
            $this->Concerts->create( $this->input->post() );
        }
        header("Location: /admin/concerts");
    }
    
    public function delete($concertId) 
    {
        $this->Concerts->delete($concertId);
        header("Location: /admin/concerts");
    }
}