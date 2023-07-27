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
        $this->builder = $this->db->table('banners');
        $this->builder->select('*');
        $this->builder->orderBy('banner_id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_banner_by_id($banner_id)
    {
        $this->builder = $this->db->table('banners');
        $this->builder->select('*');
        $this->builder->where('banner_id' , $banner_id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_banner()
    {
        $this->builder = $this->db->table('banners');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_banner($banner_id)
    {
        $this->builder = $this->db->table('banners');
        $this->builder->where('banner_id', $banner_id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_banner($banner_id)
    {
        $this->builder = $this->db->table( 'banners' );
        $this->builder->where( 'banner_id', $banner_id );
        $query = $this->builder->delete();
        return $query;
    }


}

?>