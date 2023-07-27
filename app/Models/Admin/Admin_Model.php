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
        $this->builder = $this->db->table('admin_users');
        $this->builder->where("username",$userName);
        $this->builder->where("password",md5($password));
        $this->builder->where("status_ind",1);
        $query = $this->builder->get()->getRow();
        return $query;
    }

    function get_admin_menu_item_by_id($id) 
    {
        $this->builder = $this->db->table('admin_menuitems');
        $this->builder->where("menuitem_id",$id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

 




}

?>