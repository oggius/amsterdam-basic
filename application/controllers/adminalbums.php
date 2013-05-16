<?php
class Adminalbums extends CI_Controller {

    /**
    * @var Album_model
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
        $this->load->model('Album_model');
        $this->model = $this->Album_model;
    }
    
    public function index()
    {
        $items = $this->model->getAll();
        
        $this->layout->view('admin/albums', array('items' => $items));
    }
    
    public function edit($itemId)
    {
        $data = $this->model->get($itemId);
        $this->layout->view(
                        'admin/edit_album', 
                        array(
                            'data' => $data
                            )
                        );
    }
    
    public function create()
    {
        $this->layout->view(
                        'admin/edit_album', 
                        array(
                            'data' => array()
                            )
                        );        
    }
    
    public function update()
    {
        $postData = $this->model->escapeInput($this->input->post());
        
        if ($itemId = $postData['id']) {
            $this->model->update( $postData, $itemId );
        } else {
            $itemId = $this->model->insert( $postData );
        }
        if ($_FILES['album_img']['error'] == UPLOAD_ERR_OK) {
            $this->model->initById($itemId);
            $this->model->saveTitleImage();
        }        
        header("Location: /admin/albums");
    }
    
    public function delete($itemId) 
    {
        $this->model->delete($itemId);
        header("Location: /admin/albums");
    }
    
    public function photos($albumId)
    {
        $this->model->initById($albumId);
        $albumData = $this->model->getFullData();
        $this->layout->view(
                        'admin/photos',
                        array(
                            'items'  => $albumData['pictures'],
                            'albumData' => $albumData
                            )
                        );
    }
    
    public function addphoto() 
    {
        $photoData = $this->input->post();
        $albumId = $photoData['album_id'];
        $this->load->model('Photo_model');
        $this->Photo_model->create($photoData);
        header("Location: /admin/albums/photos/" . $albumId);
    }
    
    public function updatephoto()
    {
        if ($this->input->is_ajax_request()) {
            // TODO: update code
            $photoId = intval($this->input->post('photoId'));
            $photoTitle = htmlspecialchars($this->input->post('photoTitle'));
            $photoDescription = htmlspecialchars($this->input->post('photoDescription'));
            $updData = array('title' => $photoTitle, 'description' => $photoDescription);
            $this->load->model('Photo_model');
            // update photo data
            if ($this->Photo_model->update($updData, $photoId)) {
                $this->output->set_output(json_encode(array('result' => 1)));
            } else {
                $this->output->set_output(json_encode(array('result' => 0)));
            }
        } else {
            header("Location: /admin");
        }
    }
    
    public function deletephoto()
    {
        if ($this->input->is_ajax_request()) {
            $photoId = $this->input->post('photoId');
            $this->load->model('Photo_model');
            // delete photo using overloaded method
            if ($this->Photo_model->delete($photoId)) {
                $this->output->set_output(json_encode(array('result' => 1)));
            } else {
                $this->output->set_output(json_encode(array('result' => 0)));                
            }
        } else { 
            header("Location: /admin");
        }
    }
    
    public function activate($itemId) 
    {
        $this->model->update(array('show_in_gallery' => 1), $itemId);
        header("Location: /admin/albums");        
    }
        
    public function deactivate($itemId)
    {
        $this->model->update(array('show_in_gallery' => 0), $itemId);
        header("Location: /admin/albums");
    }
}