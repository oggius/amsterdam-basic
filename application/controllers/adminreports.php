<?php
class Adminreports extends CI_Controller {

    /**
    * @var Base_model
    */
    private $model;
    
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
        $this->load->helper('Form');
        $this->load->model('Report_model');
        $this->model = $this->Report_model;
    }
    
    public function index()
    {
        $items = $this->model->getAll();
        
        $this->layout->view('admin/reports', array('items' => $items));
    }
    
    public function edit($itemId)
    {
        $this->load->model('Album_model');
        $albums = $this->Album_model->getListAsPairs();
        $data = $this->model->get($itemId);
        $this->layout->view(
                        'admin/edit_report', 
                        array(
                            'data' => $data,
                            'albums' => $albums
                            )
                        );
    }
    
    public function create()
    {
        $this->load->model('Album_model');
        $albums = $this->Album_model->getListAsPairs();
        $this->layout->view(
                        'admin/edit_report', 
                        array(
                            'data' => array(),
                            'albums' => $albums                            
                            )
                        );        
    }
    
    public function update()
    {
        if ($itemId = $this->input->post('id')) {
            $this->model->update( $this->input->post(), $itemId );
        } else {
            $this->model->insert( $this->input->post() );
        }
        header("Location: /admin/reports");
    }
    
    public function delete($itemId) 
    {
        $this->model->delete($itemId);
        header("Location: /admin/reports");
    }    
}