<?php
class Videomanager_model extends CI_Model 
{
    /**
    * returns list of video objects basing on input params
    * 
    * @param int $startFrom
    * @param int $amount
    * @return array
    */
    public function getList($startFrom, $amount)
    {
        $this->db->from('videos')
                 ->where("is_hidden", 0)
                 ->order_by('id', 'desc')
                 ->limit($amount, $startFrom);
        $res = $this->db->get();
        $videoList = array();
        if ($this->db->count_all_results() > 0) {
            $videoList = $this->_populateList($res, 'array');
        }
        return $videoList;
    }    
    
    /**
    * returns list of video-objects, linked to the the report
    * 
    * @return array
    */
    public function getLinkedToReportList($reportId)
    {
        $this->db->from('videos')
                 ->where("report_id", $reportId)
                 ->order_by('id', 'desc');
        $res = $this->db->get();
        $videoList = array();
        if ($this->db->count_all_results() > 0) {
            $videoList = $this->_populateList($res, 'object');
        }
        return $videoList;        
    }
    
    /**
    * populates list with objects or with arrays with video data
    * 
    * @param string ('array' | 'object')
    * @return array
    */
    private function _populateList(CI_DB_result $res, $fetchType)
    {
        $ci = & get_instance();
        $ci->load->model('Video_model');
        $videoList = array();
        $this->load->model('Video_model');
        foreach($res->result_array() as $videorow) {
            $video = clone $this->Video_model;
            $video->initByArray( $videorow );
            if ($fetchType == 'array') {
                $videoList[] = $video->getData();
            } else if ($fetchType == 'object') {
                $videoList[] = $video;
            }
        }        
        return $videoList;
    }
}