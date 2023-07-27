<?php


namespace App\Models\Admin;

use CodeIgniter\Model;

class BlogCategories_Model extends Model
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

    public function get_all_blog_categories()
    {
        $this->builder = $this->db->table('blog_category');
        $this->builder->select('*');
        $this->builder->orderBy('blog_category_id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_blog_category_by_id($blog_category_id)
    {
        $this->builder = $this->db->table('blog_category');
        $this->builder->select('*');
        $this->builder->where('blog_category_id' , $blog_category_id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_blog_category()
    {
        $this->builder = $this->db->table('blog_category');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_blog_category($blog_category_id)
    {
        $this->builder = $this->db->table('blog_category');
        $this->builder->where('blog_category_id', $blog_category_id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_blog_category($blog_category_id)
    {
        $this->builder = $this->db->table( 'blog_category' );
        $this->builder->where( 'blog_category_id', $blog_category_id );
        $query = $this->builder->delete();
        return $query;
    }


}

?>