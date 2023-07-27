<?php
 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Excel_Model extends Model
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

    function findAllData() 
    {  
    $this->builder = $this->db->table("career");
    $this->builder->select('id,name,email,phone_number,subject_content,enquiry,created_date');
    $query = $this->builder->get()->getResult();
    $header = array('#','Name','Email','Phone Number','Subject','Enquiry','Date');
    array_unshift($query,$header);
    return $query;
    }
}
 ?>