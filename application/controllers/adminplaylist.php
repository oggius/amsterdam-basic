<?php
class Adminplaylist extends CI_Controller {

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
        $this->load->model('Playlist_model');
        $this->model = $this->Playlist_model;
    }
    
    public function index()
    {
        $items = $this->model->getListGrouped();
        $this->layout->view('admin/playlist', array('items' => $items));
    }
    
    public function edit($itemId)
    {
        $data = $this->model->get($itemId);
        $types = $this->model->getTypes();
        $this->layout->view(
                        'admin/edit_playlist', 
                        array(
                            'data' => $data,
                            'types' => $types
                            )
                        );
    }
    
    public function create()
    {
        $types = $this->model->getTypes();        
        $this->layout->view(
                        'admin/edit_playlist', 
                        array(
                            'data' => array(),
                            'types' => $types
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
        header("Location: /admin/playlist");
    }
    
    public function delete($itemId) 
    {
        $this->model->delete($itemId);
        header("Location: /admin/playlist");
    }
}