<?php
class Guest_model extends CI_Model {          
	
    /**
    * @desc returns 
    * 
    * @param int
    */
    public function getRecords($offset, $limit = 0, $bestOnly = false)
    {
        $result = array();
        $res = $this->db->query(
                            "SELECT 
                                *,
                                DATE_FORMAT(`timestamp`,'%d-%m-%Y %H:%i%:%s') as `time`
                             FROM 
                                guestbook 
                             WHERE 
                                is_blocked = 0
                                " . ($bestOnly ? ' AND is_best = 1 ' : '') . "
                             ORDER BY   
                                timestamp DESC
                             LIMIT " . $offset . ", " . $limit . " 
                             "
                             );
        $resultTmp = $res->result_array();
        foreach ($resultTmp as $key => $row) {
            $result[$key] = $row;
        }
        return $result;
    }
    
    /**
    * @desc returns all the records
    * 
    * @param int
    */
    public function getRecordsAll()
    {
        $result = array();
        $res = $this->db->query(
                            "SELECT 
                                *,
                                DATE_FORMAT(`timestamp`,'%d-%m-%Y %H:%i%:%s') as `time`
                             FROM 
                                guestbook 
                             ORDER BY   
                                timestamp DESC"
                             );
        $resultTmp = $res->result_array();
        foreach ($resultTmp as $key => $row) {
            $result[$key] = $row;
        }
        return $result;
    }    
    
    public function getRecordsCount($bestOnly = false)
    {
        $res = $this->db->query(
                            "SELECT 
                                COUNT(*) as cnt
                             FROM 
                                guestbook 
                             WHERE 
                                is_blocked = 0
                                " . ($bestOnly ? ' AND is_best = 1 ' : '') . "
                             ");
        $result = $res->row_array();        
        return $result['cnt'];
    }
    
    public function addRecord($name, $email, $message, $ipaddress)
    {
        return $this->db->query(
                            "INSERT INTO 
                                `guestbook` 
                             SET
                                `username` = '" . $name . "',
                                `email` = '" . (!empty($email) ? $email : '') . "',
                                `text` = '" . str_replace(array("\r", "\n"), array('<br />', '<br />'), htmlspecialchars(strip_tags($message))) . "',
                                `ip` = '" . $ipaddress . "',
                                `response_to` = 0
                             ");
    }
    
    public function validateRecord($name, $email, $message)
    {
        if (!preg_match('/^[а-яА-ЯёЁa-zA-Z0-9-_\s]{1,50}$/ui', $name) || preg_match('/^[0-9]+&/', $name)) {
            //return $ci->Response_False('В имени допускаются только буквы латиницы и кириллицы, длина не должна превышать 50 знаков');
            return 'Поле имени не может быть пустым, допускаются только буквы латиницы и кириллицы, длина имени не должна превышать 50 знаков';
        }
        if (mb_stripos($name, 'amsterdam') !== false || mb_stripos($name, 'амстердам') !== false) {
            return 'Извините, но Вы не можете оставлять сообщения от имени группы';
        }
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //return $ci->Response_False('Неверный формат email');
            return 'Неверый формат email';
        }
        $message = strip_tags(trim($message));
        if (empty($message)) {
            return 'Введите текст сообщения';
        }
        //return $ci->Response_False();
        return true;
    }
    
    public function checkCanPost($ipAddress)
    {
        // check if IP isn't blocked
        $resBlocked = $this->db->query("SELECT * FROM banned_ip WHERE ip = '" . $ipAddress . "'");
        if ($resBlocked->num_rows() > 0) {
            return 'Вы не можете оставлять сообщения в этом разделе';
        }
        // check if there where no records today for this user
        $resToday = $this->db->query(
                                "SELECT * 
                                 FROM guestbook 
                                 WHERE ip = '" . $ipAddress . "' 
                                 AND DATE_FORMAT(`timestamp`, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d')"
                              );
        if ($resToday->num_rows() > 0) {
            return 'Можно оставить не больше одной записи в день';
        }
        
        return true;
    }
    
    public function block($recordId) 
    {
        $recordId = intval($recordId);
        if ($recordId) {
            $ipRes = $this->db->query("SELECT ip FROM guestbook WHERE id = '" . $recordId. "'");
            $ipRow = $ipRes->row_array();
            $this->db->insert('banned_ip', array('ip' => $ipRow['ip']));
            return $this->db->update('guestbook', array('is_blocked' => 1, 'is_best' => 0), 'id = ' . $recordId);
        } else {
            return false;
        }                
    }
    
    public function unblock($recordId) 
    {
        $recordId = intval($recordId);
        if ($recordId) {
            $ipRes = $this->db->query("SELECT ip FROM guestbook WHERE id = '" . $recordId. "'");
            $ipRow = $ipRes->row_array();
            $this->db->delete('banned_ip', array('ip' => $ipRow['ip']));
            return $this->db->update('guestbook', array('is_blocked' => 0), 'id = ' . $recordId);
        } else {
            return false;
        }        
    }
    
    /**
    * approve comment as "best"
    * 
    * @param mixed $recordId
    * @return bool
    */
    public function approve($recordId)
    {
        if ($recordId) {
           $this->unblock($recordId);
           return $this->db->update('guestbook', array('is_best' => 1), 'id = ' . (int)$recordId);
        } else {
            return false;
        }
    }
    
    /**
    * 
    * @param mixed $recordId
    * @return bool
    */
    public function delete($recordId)
    {
        if ($recordId) {
            return $this->db->delete('guestbook', array('id' => (int)$recordId));
        } else {
            return false;
        }
    }
    
    /**
    * replaces secretname mnemonic to AmsterDam
    * 
    * @param mixed $name
    */
    public function convertName($name)
    {
        if ($name == 'secretname') {
            $name = 'AmsterDam';
        }
        return $name;
    }
}