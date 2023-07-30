<?php


namespace App\Models\Admin;

use CodeIgniter\Model;

class Banners_Model extends Model
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

    public function get_all_banners()
    {
        $this->builder = $this->db->table('ut_banners');
        $this->builder->select('*');
        $this->builder->orderBy('id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_banner_by_id($id)
    {
        $this->builder = $this->db->table('ut_banners');
        $this->builder->select('*');
        $this->builder->where('id' , $id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_banner()
    {
        $this->builder = $this->db->table('ut_banners');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_banner($id)
    {
        $this->builder = $this->db->table('ut_banners');
        $this->builder->where('id', $id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_banner($id)
    {
        $this->builder = $this->db->table( 'ut_banners' );
        $this->builder->where( 'id', $id );
        $query = $this->builder->delete();
        return $query;
    }


}

?>