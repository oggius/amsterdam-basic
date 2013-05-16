<?php
abstract class Base_model extends CI_Model {          

    protected $_table;
    
    protected $_keyField = 'id';
    
    public function getAll()
    {
        $res = $this->db->query(    
                        "SELECT * 
                        FROM `" . $this->_table . "`
                        ORDER BY id DESC"                        
                        );
        if ($res) {
            return $res->result_array();
        } else {
            return false;
        }        
    }
    
    /**
    * gets row from _table by rowId
    * 
    * @param mixed $rowId
    * @return array | bool
    */
    public function get($rowId) 
    {
        $res = $this->db->query(    
                        "SELECT * 
                        FROM `" . $this->_table . "` 
                        WHERE `" . $this->_keyField . "` = '" . $rowId . "'"
                        );
        if ($res) {
            return $res->row_array();
        } else {
            return false;
        }
    }
    
    /**
    * inserts data into db
    * 
    * @param array $data
    * @return int | false
    */
    public function insert(array $data)
    {
        if ($this->db->insert($this->_table, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }        
    }
        
    public function update(array $data, $rowId)
    {
        return $this->db->update($this->_table, $data, "`" . $this->_keyField . "` = '" . $rowId . "'");
    }
    
    public function delete($rowId)
    {
        return $this->db->delete($this->_table, array($this->_keyField => $rowId));
    }
    
    public function escapeInput(array $data)
    {
        $result = array();
        foreach ($data as $key => $val) {
            if ($key == 'title' || $key == 'name') {
                $result[$key] = htmlspecialchars($val);
            } else {
                $result[$key] = $val;
            }
        }
        return $result;
    }
    
    public function unescapeOutput(array $data) {
        $result = array();
        foreach ($data as $key => $val) {
            $result[$key] = stripslashes($val);
        }
        return $result;        
    }
}