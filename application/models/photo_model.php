<?php
require_once (APPPATH . 'models/base_model.php');

class Photo_model extends Base_model
{          
    private $_albumId;
    
    private $_galleryPath = '/userfiles/gallery';
    
    protected $_table = 'photos';
    
    /**
    * sets private $_albumId property
    * 
    * @param string $albumAlias
    * @return bool
    */
    public function setAlbumByAlias($albumAlias)
    {
        $res = $this->db->query("SELECT id FROM photo_albums WHERE alias = " . $this->db->escape($albumAlias));
        $row = $res->row_array();
        $albumId = $row['id'];
        if (!empty($albumId)) {
            return $this->_albumId = $albumId;
        } else {
            return false;
        }
    }
    
    public function getAlbumData()
    {
        if (!empty($this->_albumId)) {
            $res = $this->db->query("SELECT * FROM photo_albums WHERE id = " . $this->db->escape($this->_albumId));
            $row = $res->row_array();
            return !empty($row) ? $row : false;
        } else {
            return false;
        }
    }
    
    /**
    * returns list of all albums
    * 
    */
    public function getAlbumsList($visibleOnly = true)
    {
        $this->db->from('photo_albums')->order_by('created', 'desc');
        if ($visibleOnly) {
            $this->db->where('show_in_gallery', 1);
        }
        $res = $this->db->get();
        $rows = $res->result_array();
        return !empty($rows) ? $rows : array();
    }
    
    /**
    * put your comment there...
    * 
    * @return array
    */
    public function getPhotos()
    {
        $photos = array();
        if (!empty($this->_albumId)) {
            $res = $this->db->query("SELECT * FROM photos WHERE album_id = " . $this->db->escape($this->_albumId) . " ORDER BY id");
            $photos = $res->result_array();
            foreach ($photos as &$photo) {
                $photo['src'] = $this->_galleryPath . '/' . $photo['album_id'] . '/' . $photo['src'];
                $photo['src_thmb'] = $this->_galleryPath . '/' . $photo['album_id'] . '/' . $photo['src_thmb'];
            }
        }
        return $photos;
    }
    
    public function create(array $photoData)
    {   
        if (!empty($_FILES['photo_img']['error'])) {
            return false;
        }
        $insData = array(
            'album_id' => $photoData['album_id'],
            'title' => $photoData['photo_title'],
            'description' => $photoData['photo_description'],
            'src' => '',
            'src_thmb' => ''
            );
        $photoId = parent::insert($insData);
        
        if (!empty($photoId)) {
            if ( !is_dir(ROOTPATH . 'userfiles/gallery/' . $photoData['album_id'] . '/') ) {
                mkdir( ROOTPATH . 'userfiles/gallery/' . $photoData['album_id'] . '/');
            }
            $config['upload_path'] = ROOTPATH . 'userfiles/gallery/' . $photoData['album_id'] . '/';
            $config['allowed_types'] = 'jpg';
            $config['max_width']  = '5000';
            $config['max_height']  = '5000';
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('photo_img')) {
                // sml image should be 150 px high (if vertical) or 150 px wide (if horizontal)
                $smlMaxDim = 150;
                $bigMaxDim = 650;
                $smlName = $photoId . '_sml.jpg';
                $bigName = $photoId . '.jpg';
                $smlImgPath = ROOTPATH . 'userfiles/gallery/' . $photoData['album_id'] . '/' . $smlName;
                $bigImgPath = ROOTPATH . 'userfiles/gallery/' . $photoData['album_id'] . '/' . $bigName;

                $uploadData = $this->upload->data();

                if ($uploadData['image_width'] >= $uploadData['image_height']) {
                    $ratio =  $uploadData['image_width'] / $uploadData['image_height'];
                    $smlconfig = array(
                                    'source_image' => $uploadData['full_path'],
                                    'new_image' => $smlImgPath,
                                    'width' => $smlMaxDim,
                                    'height' => $smlMaxDim / $ratio
                                    );
                    $bigconfig = array(
                                    'source_image' => $uploadData['full_path'],
                                    'new_image' => $bigImgPath,
                                    'width' => $bigMaxDim,
                                    'height' => $bigMaxDim / $ratio
                                    );
                } else {                    
                    $ratio =  $uploadData['image_height'] / $uploadData['image_width'];
                    $smlconfig = array(
                                    'source_image' => $uploadData['full_path'],
                                    'new_image' => $smlImgPath,
                                    'width' => $smlMaxDim / $ratio,
                                    'height' => $smlMaxDim
                                    );
                    $bigconfig = array(
                                    'source_image' => $uploadData['full_path'],
                                    'new_image' => $bigImgPath,
                                    'width' => $bigMaxDim / $ratio,
                                    'height' => $bigMaxDim
                                    );                      
                }

                $this->load->library('image_lib', $smlconfig);                
                // resize to create sml image
                $resizeResult1 = $this->image_lib->resize();
                $this->image_lib->initialize($bigconfig);
                $resizeResult1 = $this->image_lib->resize();
                if ($resizeResult1 && $resizeResult1) {
                    $result = $this->db->update(
                                        $this->_table, 
                                        array(
                                            'src_thmb' => $smlName, 
                                            'src' => $bigName
                                            ), 
                                        "id = '" . $photoId . "'"
                                        );
                    unlink( $uploadData['full_path'] );
                }
                return $result;
            }
            return false;
        }
    }
    
    public function delete($photoId) {
        $res = $this->db->query("SELECT * FROM photos WHERE id = '" . $photoId . "'");
        $data = $res->row_array();
        if ($data) {
            parent::delete($data['id']);
            if (is_file(ROOTPATH . $this->_galleryPath . '/' . $data['album_id'] . '/' . $data['src'])) {
                unlink(ROOTPATH . $this->_galleryPath . '/' . $data['album_id'] . '/' . $data['src']);
            }
            if (is_file(ROOTPATH . $this->_galleryPath . '/' . $data['album_id'] . '/' .  $data['src_thmb'])) {
                unlink(ROOTPATH . $this->_galleryPath . '/' . $data['album_id'] . '/' . $data['src_thmb']);
            }
            return true;
        } else {
            return false;
        }
    }
}