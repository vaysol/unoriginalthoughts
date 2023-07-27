<?php


namespace App\Models\Admin;

use CodeIgniter\Model;

class Jobs_Model extends Model
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

    public function get_all_jobs_for_admin()
    {
        $this->builder = $this->db->table('jobs');
        $this->builder->select('*');
        $this->builder->orderBy('id','DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_job_by_id($id)
    {
        $this->builder = $this->db->table('jobs');
        $this->builder->select('*');
        $this->builder->where('id' , $id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_into_job()
    {
        $this->builder = $this->db->table('jobs');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_job($id)
    {
        $this->builder = $this->db->table('jobs');
        $this->builder->where('id', $id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_job($leader_id)
    {
        $this->builder = $this->db->table( 'jobs' );
        $this->builder->where( 'leader_id', $leader_id );
        $query = $this->builder->delete();
        return $query;
    }
}

?>