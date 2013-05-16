<?php
class Adminnews extends CI_Controller {

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
        $this->load->model('News_model', 'News');
        $this->model = $this->News;
    }
    
    public function index()
    {
        $items = $this->model->getAll();
        
        $this->layout->view('admin/news', array('items' => $items));
    }
    
    public function edit($itemId)
    {
        $data = $this->model->get($itemId);
        $this->layout->view(
                        'admin/edit_news', 
                        array(
                            'data' => $data
                            )
                        );
    }
    
    public function create()
    {
        $this->layout->view(
                        'admin/edit_news', 
                        array(
                            'data' => array()
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
        header("Location: /admin/news");
    }
    
    public function delete($itemId) 
    {
        $this->model->delete($itemId);
        header("Location: /admin/news");
    }
    
    public function activate($itemId) 
    {
        $this->model->update(array('is_active' => 1), $itemId);
        header("Location: /admin/news");        
    }
    
    public function deactivate($itemId)
    {
        $this->model->update(array('is_active' => 0), $itemId);
        header("Location: /admin/news");                
    }
}