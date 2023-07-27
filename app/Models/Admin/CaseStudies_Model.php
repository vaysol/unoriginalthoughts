<?php

namespace App\Models\Admin;

use CodeIgniter\Controller;

class CaseStudies_Model extends Controller
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

    public function get_all_case_studies()
    {
        $this->builder = $this->db->table('case_studies');
        $this->builder->select('*');
        $this->builder->orderBy('case_studies_id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_case_study_by_id($case_studies_id)
    {
        $this->builder = $this->db->table('case_studies');
        $this->builder->select('*');
        $this->builder->where('case_studies_id' , $case_studies_id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_case_study()
    {
        $this->builder = $this->db->table('case_studies');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_case_study($case_studies_id )
    {
        $this->builder = $this->db->table('case_studies');
        $this->builder->where('case_studies_id', $case_studies_id );
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_case_study($case_studies_id)
    {
        $this->builder = $this->db->table( 'case_studies' );
        $this->builder->where( 'case_studies_id', $case_studies_id );
        $query = $this->builder->delete();
        return $query;
    }
}
?>