<?php
class Adminplaces extends CI_Controller {

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
        $this->load->model('Places_model', 'Places');
        $this->load->helper('form');
    }
    
    public function index()
    {
        $places = $this->Places->getList();
        
        $this->layout->view('admin/places', array('places' => $places));
    }
    
    public function edit($placeId)
    {
        if ($this->input->post()) {
            $this->update();
        }
        $placeData = $this->Places->get($placeId);
        $this->layout->view(
                        'admin/edit_place', 
                        array(
                            'data' => $placeData
                            )
                        );
    }
    
    public function create()
    {
        if ($this->input->post()) {
            $this->update();
        }                        
        $this->layout->view(
                        'admin/edit_place'
                        );
        
    }
    
    public function update()
    {
        if ($this->input->post('id')) {
            $placeId = $this->input->post('id');
            $this->Places->update( $this->input->post(null, true) );            
        } else {
            $placeId = $this->Places->create( $this->input->post(null, true) );
        }
        // update place image if placeId is obtained correctly
        if ($placeId) {
            $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/userfiles/places/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $this->load->library('upload', $config);
            
            if ( $this->upload->do_upload('place_image')) {
                $uploadData = $this->upload->data();
                $ratio = $uploadData['image_width'] / $uploadData['image_height'];
                $imgExt = $uploadData['file_ext'];
                $newImgName = 'place' . $placeId . $imgExt;
                $imgconfig = array(
                                'source_image' => $uploadData['full_path'],
                                'new_image' => $_SERVER['DOCUMENT_ROOT'] . '/userfiles/places/' . $newImgName,
                                'width' => '100',
                                'height' => '100' / $ratio
                                );

                $this->load->library('image_lib', $imgconfig);
                
                if ($this->image_lib->resize()) {
                    unlink( $uploadData['full_path'] );
                    $this->Places->update( array_merge($this->input->post(), array('image' => $newImgName, 'id' => $placeId)) );
                }
            }
        }
        header("Location: /admin/places");
    }
    
    public function delete($placeId) 
    {
        $this->Places->delete($placeId);
        header("Location: /admin/places");
    }
}