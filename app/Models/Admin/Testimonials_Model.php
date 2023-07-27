<?php


namespace App\Models\Admin;

use CodeIgniter\Model;

class Testimonials_Model extends Model
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

    public function get_all_testimonials()
    {
        $this->builder = $this->db->table('testimonials');
        $this->builder->select('*');
        $this->builder->orderBy('testimonial_id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_testimonial_by_id($testimonial_id)
    {
        $this->builder = $this->db->table('testimonials');
        $this->builder->select('*');
        $this->builder->where('testimonial_id' , $testimonial_id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_testimonial()
    {
        $this->builder = $this->db->table('testimonials');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_testimonial($testimonial_id)
    {
        $this->builder = $this->db->table('testimonials');
        $this->builder->where('testimonial_id', $testimonial_id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_testimonial($testimonial_id)
    {
        $this->builder = $this->db->table( 'testimonials' );
        $this->builder->where( 'testimonial_id', $testimonial_id );
        $query = $this->builder->delete();
        return $query;
    }


}

?>