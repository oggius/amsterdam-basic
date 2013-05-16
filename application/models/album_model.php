<?php
require_once APPPATH . 'models/base_model.php';  

class Album_model extends Base_model
{     
    private $_id;
         
    private $_pictures = array();
    
    private $_albumData = array();

    private $_galleryPath = '/userfiles/gallery';
    
    protected $_table = 'photo_albums';
    
    private function _init()
    {
        if (!empty($this->_id)) {
            $this->_setPhotosList();
            $this->_setAlbumData();
        }
    }
    
    public function setId($id)
    {        
        $this->_id = intval($id);
    }
    
    public function setIdByAlias($alias)
    {        
        $res = $this->db->query("SELECT id FROM photo_albums WHERE alias = " . $this->db->escape($alias));
        $row = $res->row_array();
        if (!empty($row['id'])) {
            $this->_id = $row['id'];
        }
        return;
    }
    
    public function initByAlias($alias)
    {
        $this->setIdByAlias($alias);
        $this->_init();
    }
    
    public function initById($id)
    {
        $this->setId($id);
        $this->_init();
    }
    
    public function getFullData()
    {
        return array_merge(
                        $this->_albumData, 
                        array('pictures' => $this->_pictures)
                    );
    }
    
    /**
    * returns array of pictures of the album
    * 
    * @return array
    */    
    public function getPhotos()
    {
        if (empty($this->_pictures)) {
            $this->_setPhotosList();
        }
        return $this->_pictures;
    }
    
    /**
    * set $this->_pictures property
    * 
    */
    private function _setPhotosList()
    {
        $photos = array();
        if (!empty($this->_id)) {
            $res = $this->db->query(
                                "SELECT * 
                                 FROM photos 
                                 WHERE album_id = " . $this->db->escape($this->_id) . " 
                                 ORDER BY id"
                              );
            $photos = $res->result_array();
            foreach ($photos as &$photo) {
                $photo['src'] = $this->_galleryPath . '/' . $photo['album_id'] . '/' . $photo['src'];
                $photo['src_thmb'] = $this->_galleryPath . '/' . $photo['album_id'] . '/' . $photo['src_thmb'];
            }
        }
        $this->_pictures = $photos;
        return !empty($photos) ? true : false;
    } 
    
    /**
    * populates _albumData property
    * 
    * @return void;
    */
    private function _setAlbumData()
    {
        $res = $this->db->query("SELECT * FROM photo_albums WHERE id = " . $this->_id);
        $row = $res->row_array();
        if (!empty($row)) {
            $this->_albumData = $row;
            return true;
        } else {
            return false;
        }
    }
    
    public function getAlbumData()
    {
        return $this->_albumData;
    } 
    
    /**
    * returns list of all available albums as id => data pairs
    * 
    * @return arrat
    */
    public function getListAsPairs()
    {
        $res = $this->db->query("SELECT * FROM photo_albums");
        $rows = $res->result_array();
        $result = array();
        if (count($rows) > 0) {
            foreach($rows as $row) {
                $result[$row['id']] = $row['name'];
            }
        }
        return $result;
    }  
    
    public function delete($itemId)
    {
        $this->initById($itemId);
        if (!empty($this->_id)) {
            $albumData = $this->getFullData();
            // at first, remove album itself
            $this->db->delete($this->_table, array('id' => $albumData['id']));
            foreach ($albumData['pictures'] as $photo) {
                unlink($_SERVER['DOCUMENT_ROOT']  . $photo['src']);
                unlink($_SERVER['DOCUMENT_ROOT']  . $photo['src_thmb']);
            }
            // unlink album title image
            unlink($_SERVER['DOCUMENT_ROOT'] . '/userfiles/gallery/' . $itemId . '/title.jpg');
            unlink($_SERVER['DOCUMENT_ROOT'] . '/userfiles/gallery/' . $itemId . '/');
            // delete photos
            $this->db->delete('photos', array('album_id' => $albumData['id']));
            // delete links
            $this->db->update('reports', array('album_id' => 0), "album_id = " . $albumData['id']);
            return true;
        } else {
            return false;
        }
    }
    
    public function saveTitleImage()
    {
        if (empty($this->_id)) {
            return false;
        }
        if ( !is_dir(ROOTPATH . 'userfiles/gallery/' . $this->_id . '/') ) {
            mkdir( ROOTPATH . 'userfiles/gallery/' . $this->_id . '/');
        }
        $config['upload_path'] = ROOTPATH . 'userfiles/gallery/' . $this->_id . '/';
        $config['allowed_types'] = 'jpg';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        $this->load->library('upload', $config);

        $imgconfig = array(
                        'new_image' => ROOTPATH . 'userfiles/gallery/' . $this->_id . '/title.jpg',
                        'width' => '200'
                        );
        
        if ( $this->upload->do_upload('album_img')) {
            $uploadData = $this->upload->data();
            $ratio = $uploadData['image_width'] / $uploadData['image_height'];
            $imgconfig['source_image'] = $uploadData['full_path'];
            $imgconfig['height'] = $imgconfig['width'] / $ratio;

            $this->load->library('image_lib', $imgconfig);
            
            if ($this->image_lib->resize()) {
                unlink( $uploadData['full_path'] );
            }
            return true;
        } else if ( !is_file(ROOTPATH . $this->_galleryPath . '/' . $this->_id . '/title.jpg') ) {
            $pictures = $this->getPhotos();
            if (count($pictures) > 0) {
                $firstPic = reset($pictures);
                $imgsize = getimagesize(ROOTPATH . $firstPic['src']);
                $ratio = $imgsize[0] / $imgsize[1];
                
                $imgconfig['source_image'] = ROOTPATH . $firstPic['src'];
                $imgconfig['height'] = $imgconfig['width'] / $ratio;

                $this->load->library('image_lib', $imgconfig);
                
                if ($this->image_lib->resize()) {
                    return true;
                } else {
                    return false;
                }
            } 
        } else {
            return false;
        }
    }
}