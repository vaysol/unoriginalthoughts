<?php


namespace App\Models\Admin;

use CodeIgniter\Controller;

class ContactUsAdmin_Model extends Controller
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

    public function get_all_contact_us()
    {
        $this->builder = $this->db->table('contact_us');
        $this->builder->select('*');
        $this->builder->orderBy('id' ,'Desc');
        $query = $this->builder->get()->getResultArray();
        return $query; 
    }

    public function delete_contact_us($id)
    {
        $this->builder = $this->db->table( 'contact_us' );
        $this->builder->where( 'id', $id );
        $query = $this->builder->delete();
        return $query;
    }

    function get_contact_us_by_id($id)
    {
        $this->builder = $this->db->table('contact_us');
        $this->builder->select('*');
        $this->builder->where('id' ,$id);
        $query = $this->builder->get()->getResultArray();
        return $query; 
    }
}

?>