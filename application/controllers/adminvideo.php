<?php
class Adminvideo extends CI_Controller {

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
        $this->load->model('Video_model');
        $this->model = $this->Video_model;
    }
    
    public function index()
    {
        $items = $this->model->getAll();
        
        $this->layout->view('admin/video', array('items' => $items));
    }
    
    public function edit($itemId)
    {
        $this->load->model('Reportmanager_model');
        $reports = $this->Reportmanager_model->getListAsPairs();
        $data = $this->model->get($itemId);
        $this->layout->view(
                        'admin/edit_video', 
                        array(
                            'data' => $data,
                            'reports' => $reports
                            )
                        );
    }
    
    public function create()
    {
        $this->load->model('Reportmanager_model');
        $reports = $this->Reportmanager_model->getListAsPairs();        
        $this->layout->view(
                        'admin/edit_video', 
                        array(
                            'data' => array(),
                            'reports' => $reports
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
        header("Location: /admin/video");
    }
    
    public function delete($itemId) 
    {
        $this->model->delete($itemId);
        header("Location: /admin/video");
    }
    
    public function unblock($itemId) 
    {
        $this->model->update(array('is_hidden' => 0), $itemId);
        header("Location: /admin/video");        
    }
    
    public function block($itemId)
    {
        $this->model->update(array('is_hidden' => 1), $itemId);
        header("Location: /admin/video");                
    }
}