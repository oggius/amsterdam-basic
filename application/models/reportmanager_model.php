<?php
class Reportmanager_model extends CI_Model
{          
    /**
    * returns array of Report_model objects
    * @return array
    */
    public function getLatest($startFrom = 0, $amount = 3)
    {
        $res = $this->db->query("SELECT * FROM reports ORDER BY created DESC LIMIT " . $startFrom . ", " . $amount);
        $rows = $res->result_array();
        $reportsList = array();
        if (count($rows) > 0) {
            $this->load->model('Report_model');
            foreach ($rows as $row) {
                $report = clone $this->Report_model;
                $report->initById($row['id']);
                $reportsList[] = $report;
            }
        }
        return $reportsList;
    }
    
    public function getListAsPairs()
    {
        $res = $this->db->query("SELECT * FROM reports");
        $rows = $res->result_array();
        $reportsList = array();
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                $reportsList[$row['id']] = $row['name'];
            }
        }
        return $reportsList;
    }
}