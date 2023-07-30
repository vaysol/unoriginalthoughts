<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProductCategory_Model extends Model
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

    public function get_all_product_categories()
    {
        $this->builder = $this->db->table('ut_product_categories');
        $this->builder->select('*');
        $this->builder->orderBy('id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }
    
    public function get_product_category_by_id($id)
    {
        $this->builder = $this->db->table('ut_product_categories');
        $this->builder->select('*');
        $this->builder->where('id' , $id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }
    
    public function insert_product_category()
    {
        $this->builder = $this->db->table('ut_product_categories');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_product_category($id)
    {
        $this->builder = $this->db->table('ut_product_categories');
        $this->builder->where('id', $id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_product_category($id)
    {
        $this->builder = $this->db->table( 'ut_product_categories' );
        $this->builder->where( 'id', $id );
        $query = $this->builder->delete();
        return $query;
    }
}

?>