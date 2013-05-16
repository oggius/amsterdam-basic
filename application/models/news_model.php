<?php
require_once (APPPATH . 'models/base_model.php');
class News_model extends Base_model {          
	
    protected $_table = 'news';
    
    /**
    * @desc 
    * 
    * @param int
    */
    public function getLatest($limit = 0)
    {
        $result = array();
        $res = $this->db->query(
                            "SELECT 
                                *,
                                DATE_FORMAT(`timestamp`,'%d-%m-%Y') as `date`
                             FROM 
                                news 
                             WHERE 
                                is_active = 1
                             ORDER BY   
                                timestamp DESC                      
                                " . ($limit > 0 ? " LIMIT " . $limit : "")
                             );
        $resultTmp = $res->result_array();
        foreach ($resultTmp as $key => $row) {
            if (mb_strlen($row['text_short']) >= 150) {
                $row['text_short'] = mb_substr($row['text_short'], 0, 150) . '...';                 
            }
            $result[$key] = $row;
        }
        return $result;
    }
    
    /**
    * get info on the single news item
    * 
    * @param mixed $itemId
    */
    public function getItem($itemId)
    {
        $res = $this->db->query("SELECT *, DATE_FORMAT(`timestamp`, '%d-%m-%Y') as `time` FROM news WHERE id = '" . intval($itemId) . "' AND is_active = 1");
        if ($res) {
            $result = $res->row();
        } else {
            $result = null;
        }        
        return $result;
    }
    
    public function getAll()
    {
        $res = $this->db->query(
                            "SELECT 
                                *,
                                DATE_FORMAT(`timestamp`,'%d-%m-%Y') as `date`
                             FROM 
                                news 
                             ORDER BY   
                                timestamp DESC"
                             );
        $result = $res->result_array();
        return $result;        
    }
}