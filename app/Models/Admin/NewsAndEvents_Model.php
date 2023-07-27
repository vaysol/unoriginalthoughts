<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class NewsAndEvents_Model extends Model
{
    public $builder;    
    public $db; 
    public $data;   

    function __construct()
    {
        //Connecting Database
        $this->db = \Config\Database::connect();
        $this->data = array();
    }

    public function get_all_news_and_events()
    {
        $this->builder = $this->db->table('press_releases');
        $this->builder->select('*');
        $this->builder->orderBy('release_id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_news_and_event_by_id($release_id)
    {
        $this->builder = $this->db->table('press_releases');
        $this->builder->select('*');
        $this->builder->where('release_id' , $release_id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_news_and_event()
    {
        $this->builder = $this->db->table('press_releases');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_news_and_event($release_id )
    {
        $this->builder = $this->db->table('press_releases');
        $this->builder->where('release_id', $release_id  );
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_news_and_event($release_id)
    {
        $this->builder = $this->db->table( 'press_releases' );
        $this->builder->where( 'release_id', $release_id );
        $query = $this->builder->delete();
        return $query;
    }

}

?>