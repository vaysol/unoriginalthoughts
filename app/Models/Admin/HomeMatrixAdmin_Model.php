<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class HomeMatrixAdmin_Model extends Model
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

    public function get_all_home_matrix()
    {
        $this->builder = $this->db->table('home_matrix');
        $this->builder->select('*');
        $this->builder->orderBy('id' ,'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_home_matrix_by_id($id)
    {
        $this->builder = $this->db->table('home_matrix');
        $this->builder->select('*');
        $this->builder->where('id' , $id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function update_home_matrix($id)
    {
        $this->builder = $this->db->table('home_matrix');
        $this->builder->where('id', $id);
        $query = $this->builder->update($this->data);
        return $query;
    }


}
?>