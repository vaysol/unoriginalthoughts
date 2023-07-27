<?php


namespace App\Models\Admin;

use CodeIgniter\Model;

class Doctors_Model extends Model
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

    public function get_all_doctors()
    {
        $this->builder = $this->db->table('doctors');
        $this->builder->select('*');
        $this->builder->orderBy('id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_all_locations()
    {
        $this->builder = $this->db->table('locations');
        $this->builder->select('*');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_doctor_by_id($id)
    {
        $this->builder = $this->db->table('doctors');
        $this->builder->select('*');
        $this->builder->where('id' , $id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_doctor()
    {
        $this->builder = $this->db->table('doctors');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_doctor($id)
    {
        $this->builder = $this->db->table('doctors');
        $this->builder->where('id', $id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_doctor($id)
    {
        $this->builder = $this->db->table('doctors');
        $this->builder->where( 'id', $id );
        $query = $this->builder->delete();
        return $query;
    }


}

?>