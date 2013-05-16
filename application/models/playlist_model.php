<?php
require_once APPPATH . 'models/base_model.php';

class Playlist_model extends Base_model {          
    
    protected $_table = 'playlist';
    /**
    * @desc 
    */
    public function getList()
    {
        $query = "SELECT 
                    song_name,
                    author_name,
                    type_id,
                    title
                 FROM 
                    playlist
                 INNER JOIN 
                    song_types ON song_types.id = playlist.type_id
                 ORDER BY
                    type_id,
                    author_name,
                    song_name";
        $res = $this->db->query($query);
        $result = $res->result_array();
        return $result;        
    }
    
    /**
    * put your comment there...
    * 
    */
    public function getListGrouped()
    {
        $query = "SELECT 
                    song_name,
                    author_name,
                    type_id,
                    title,
                    playlist.id
                 FROM 
                    playlist
                 INNER JOIN 
                    song_types ON song_types.id = playlist.type_id
                 ORDER BY
                    type_id,
                    author_name,
                    song_name";
        $res = $this->db->query($query);
        $result = $res->result_array();
        $resultSongs = array();
        foreach ($result as $song) {
            if (!isset($resultSongs[$song['type_id']])) {
                $resultSongs[$song['type_id']] = array(
                                        'type' => $song['title'],
                                        'songs' => array()
                                     );
            }
            $resultSongs[$song['type_id']]['songs'][] = array(
                                                            'author' => $song['author_name'], 
                                                            'title' => $song['song_name'],
                                                            'id'    => $song['id']
                                                        );
        }
        return $resultSongs;
    }
    
    public function getTypes()
    {
        $res = $this->db->query("SELECT * FROM song_types");
        $rows = $res->result_array();
        $result = array();
        if (count($rows) > 0) {
            foreach($rows as $row) {
                $result[$row['id']] = $row['title'];
            }
        }
        return $result;
    }
}
