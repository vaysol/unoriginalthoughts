<?php 


namespace App\Models\Admin;


use CodeIgniter\Model;

class Admin_Model extends Model
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

    public function login($userName, $password){
        $this->builder = $this->db->table('ut_admin_user');
        $this->builder->where("username",$userName);
        $this->builder->where("password",md5($password));
        $this->builder->where("status",1);
        $query = $this->builder->get()->getRow();
        return $query;
    }

 




}

?>