<?php

namespace App\Models\Admin;

use CodeIgniter\Controller;

class Blogs_Model extends Controller
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

    public function get_all_blogs()
    {
        $this->builder = $this->db->table('blog');
        $this->builder->select('*');
        $this->builder->orderBy('blog_id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function select_all_blog_categories()
    {
        $this->builder = $this->db->table('blog_category');
        $this->builder->select('*');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function select_all_doctors()
    {
        $this->builder = $this->db->table('doctors');
        $this->builder->select('*');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_blog_by_id($blog_id)
    {
        $this->builder = $this->db->table('blog');
        $this->builder->select('*');
        $this->builder->where('blog_id' , $blog_id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_blog()
    {
        $this->builder = $this->db->table('blog');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_blog($blog_id )
    {
        $this->builder = $this->db->table('blog');
        $this->builder->where('blog_id', $blog_id );
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_blog($blog_id)
    {
        $this->builder = $this->db->table( 'blog' );
        $this->builder->where( 'blog_id', $blog_id );
        $query = $this->builder->delete();
        return $query;
    }
}
?>