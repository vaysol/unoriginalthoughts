<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ResearchPapers_Model extends Model
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

    public function get_all_research_papers()
    {
        $this->builder = $this->db->table('research_papers');
        $this->builder->select('*');
        $this->builder->orderBy('research_id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_research_paper_by_id($research_id)
    {
        $this->builder = $this->db->table('research_papers');
        $this->builder->select('*');
        $this->builder->where('research_id' , $research_id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_research_paper()
    {
        $this->builder = $this->db->table('research_papers');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_research_papers($research_id )
    {
        $this->builder = $this->db->table('research_papers');
        $this->builder->where('research_id', $research_id  );
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_research_paper($research_id)
    {
        $this->builder = $this->db->table( 'research_papers' );
        $this->builder->where( 'research_id', $research_id );
        $query = $this->builder->delete();
        return $query;
    }
}
?>