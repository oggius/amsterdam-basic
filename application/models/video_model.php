<?php
require_once APPPATH . 'models/base_model.php';
class Video_model extends Base_model 
{
    private $_data;
    
    protected $_table = 'videos';
    
    /**
    * inits video object by id
    * 
    * @param int $videoId
    * @return bool
    */
    public function initById($videoId)
    {
        if (!empty($videoId)) {
            $res = $this->db->query("SELECT * FROM videos WHERE id = " . $this->db->escape($videoId));
            $row = $res->row_array();
            if (!empty($row)) {
                $this->_data = $row;
                $result = true;
            } else {
                $result = false;
            }
        } else {
            $result = false;
        }
        return $result;
    }
    
    /**
    * inits video object from input array of data
    * 
    * @param mixed $videoData
    */
    public function initByArray(array $videoData)
    {
        if (!empty($videoData['id']) && !empty($videoData['embeded_code'])) {
            $this->_data = $videoData;
            return true;
        } else {
            return false;
        }
    }
    
    /**
    * returns video data
    * 
    * @return array
    */
    public function getData()
    {
        return $this->_data;
    }
}