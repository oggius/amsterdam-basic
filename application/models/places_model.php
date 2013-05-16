<?php
class Places_model extends CI_Model {          
	
    /**
    * @desc 
    */
    public function getList()
    {
        $result = array();
        $res = $this->db->query(
                            "SELECT 
                                *
                             FROM 
                                places
                             ORDER BY   
                                name ASC"
                             );
        $result = $res->result_array();
        return $result;
    }
    
    public function get($placeId)
    {
        $query = "SELECT 
                    *                     
                    FROM 
                        places AS p
                     WHERE 
                        p.id = '" . (int)$placeId . "'";
                        
        $res = $this->db->query( $query );
        $result = $res->row_array();
        return $result;                        
    }
    
    public function delete($placeId) 
    {
        return $this->db->query("DELETE FROM places WHERE id = '" . (int)$placeId . "'");
    }
    
    public function create(array $placeData)
    {
        $insData = array(
                        'name' => $placeData['name'],
                        'description' => $placeData['description'],
                        'address' => $placeData['address'],
                        'contacts' => $placeData['contacts'],
                        'website' => $placeData['website']
                      );
        if ($this->db->insert('places', $insData)) {
            return $this->db->insert_id();
        } else {
            return null;
        }
    }
    
    public function update(array $placeData)
    {
        $updateData = array(
                        'name' => htmlspecialchars($placeData['name']),
                        'description' => $placeData['description'],
                        'address' => $placeData['address'],
                        'contacts' => $placeData['contacts'],
                        'website' => $placeData['website'],
                        'image' => empty($placeData['image']) ? 'no_image.gif' : $placeData['image']
                      );
        return $this->db->update('places', $updateData, array('id' => $placeData['id']));
    }
}
