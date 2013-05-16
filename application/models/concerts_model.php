<?php
class Concerts_model extends CI_Model {          
	
    /**
    * @desc 
    */
    public function getList()
    {
        $result = array();
        $res = $this->db->query(
                            "SELECT 
                                name, 
                                alias, 
                                description, 
                                time,
                                image,
                                place_id
                             FROM 
                                concerts 
                             ORDER BY   
                                time ASC"
                             );
        $result = $res->result_array();
        return $result;
    }
    
    /**
    * returns list of all future concerts
    * @param int
    * @return array
    */
    public function getFuture($limit = 0)
    {
        $result = array();
        $query =  "SELECT 
                        c.id,
                        c.name as name, 
                        p.name as place_name,
                        alias, 
                        c.description, 
                        time,
                        UNIX_TIMESTAMP(time) as timestamp,
                        c.image AS concert_image,
                        p.image AS place_image,
                        p.address,
                        p.contacts
                     FROM 
                        concerts AS c
                     INNER JOIN 
                        places AS p ON p.id = c.place_id
                     WHERE 
                        time > NOW()
                     ORDER BY   
                        time ASC";
        if (!empty($limit)) {
            $query .= " LIMIT " . $limit;
        }

        $res = $this->db->query( $query );
        $result = $res->result_array();
        return $result;
    }
    
    public function get($concertId)
    {
        $query = "SELECT 
                        *
                     FROM 
                        concerts AS c
                     WHERE 
                        c.id = '" . (int)$concertId . "'";
                        
        $res = $this->db->query( $query );
        $result = $res->row_array();
        return $result;                        
    }
    
    public function delete($concertId) 
    {
        return $this->db->query("DELETE FROM concerts WHERE id = '" . (int)$concertId . "'");
    }
    
    public function create(array $concertData)
    {
        $finalData = array(
                'name' => $concertData['name'],
                'description' => $concertData['description'],
                'place_id' => $concertData['place_id'],
                'time' => $concertData['time'],
            );
        $result = $this->db->insert('concerts', $finalData);
        return $result;
    }
    
    public function update(array $concertData)
    {
        $finalData = array(
                'name' => $concertData['name'],
                'description' => $concertData['description'],
                'place_id' => $concertData['place_id'],
                'time' => $concertData['time'],
            );
        if (!empty($concertData['id'])) {
            $result = $this->db->update('concerts', $finalData, array('id' => $concertData['id']));            
        } else {
            $result = false;
        }
        return $result;
    }
}