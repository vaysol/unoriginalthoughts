<?php

namespace App\Models\Admin;

use CodeIgniter\Controller;

class Specialities_Model extends Controller
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

    public function get_all_specialities()
    {
        $this->builder = $this->db->table('specialities');
        $this->builder->select('*');
        $this->builder->orderBy('speciality_id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_all_speciality_type()
    {
        $this->builder = $this->db->table('speciality_type');
        $this->builder->select('*');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_all_dotors_speciality()
    {
        $this->builder = $this->db->table('doctors');
        $this->builder->select('*');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_speciality_by_id($speciality_id)
    {
        $this->builder = $this->db->table('specialities');
        $this->builder->select('*');
        $this->builder->where( 'speciality_id', $speciality_id );
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_speciality()
    {
        $this->builder = $this->db->table('specialities');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_speciality($speciality_id )
    {
        $this->builder = $this->db->table('specialities');
        $this->builder->where('speciality_id', $speciality_id  );
        $query = $this->builder->update($this->data);
        return $query;
    }


    public function delete_speciality($speciality_id)
    {
        $this->builder = $this->db->table( 'specialities');
        $this->builder->where( 'speciality_id', $speciality_id );
        $query = $this->builder->delete();
        return $query;
    }

}
?>