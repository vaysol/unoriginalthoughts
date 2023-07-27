<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Leader_Model extends Model
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

    public function get_all_leaders_for_admin()
    {
        $this->builder = $this->db->table('leadership');
        $this->builder->select('*');
        $this->builder->orderBy('leader_id','DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_leader_by_id_for_admin($leader_id)
    {
        $this->builder = $this->db->table('leadership');
        $this->builder->select('*');
        $this->builder->where('leader_id' , $leader_id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_into_leaders()
    {
        $this->builder = $this->db->table('leadership');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_leaders($leader_id)
    {
        $this->builder = $this->db->table('leadership');
        $this->builder->where('leader_id', $leader_id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_leaders($leader_id)
    {
        $this->builder = $this->db->table( 'leadership' );
        $this->builder->where( 'leader_id', $leader_id );
        $query = $this->builder->delete();
        return $query;
    }
}

?>