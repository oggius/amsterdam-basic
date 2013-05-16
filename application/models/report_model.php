<?php
require_once APPPATH . 'models/base_model.php';

class Report_model extends Base_model
{          
    /**
    * put your comment there...
    * 
    * @var Album_model
    */   
    private $_album;
    
    private $_data;
    
    private $_videoList;
    
    protected $_table = 'reports';
    
    public function initByAlias($reportAlias)
    {
        $res = $this->db->query("SELECT * FROM reports WHERE alias = " . $this->db->escape($reportAlias));
        $row = $res->row_array();
        $this->_data = $row;
        if (!empty($row['album_id'])) {
            $this->initAlbum($row['album_id']);
        }
    }
    
    public function initById($reportId)
    {
        $res = $this->db->query("SELECT * FROM reports WHERE id = " . intval($reportId));
        $row = $res->row_array();
        $this->_data = $row;
        if (!empty($row['album_id'])) {
            $this->initAlbum($row['album_id']);
        }        
    }
    
    public function initAlbum($albumId)
    {
        $this->load->model('Album_model');
        $album = clone $this->Album_model;
        $album->initById($albumId);
        if (count( $album->getAlbumData() ) > 0) {
            $this->_album = $album;
            return true;
        } else {
            return false;
        }
    }
    
    /**
    * creates list of linked videos and populates _videoList property
    * 
    * @return bool
    */
    public function initLinkedVideo()
    {
        if ($this->isInit()) {
            $this->load->model('videomanager_model', 'Videomanager');
            $videoList = $this->Videomanager->getLinkedToReportList($this->_data['id']);
            if (!empty($videoList)) {
                $this->_videoList = $videoList;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    /**
    * checks if object is correctly initialized
    * 
    * @return bool
    */
    public function isInit()
    {
        return is_array($this->_data) && !empty($this->_data['id']);
    }
    
    /**
    * returns report data
    * 
    * @return array
    */
    public function getData()
    {
        return !empty($this->_data) ? $this->_data : array();
    }
    
    /**
    * returns linked album
    * 
    */
    public function getLinkedAlbum()
    {
        return $this->_album;
    }
    
    /**
    * returns list of videos linked to the report
    * 
    * @return array
    */
    public function getLinkedVideos()
    {
        return !empty($this->_videoList) ? $this->_videoList : array();
    }
}