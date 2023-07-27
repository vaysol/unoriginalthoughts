<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CareerAdmin_Model extends Model
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

    public function get_all_careers()
    {
        $this->builder = $this->db->table('career');
        $this->builder->select('*');
        $this->builder->orderBy('id' ,'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query; 
    }

    public function delete_career($id)
    {
        $this->builder = $this->db->table( 'career' );
        $this->builder->where( 'id', $id );
        $query = $this->builder->delete();
        return $query;
    }

}

?>