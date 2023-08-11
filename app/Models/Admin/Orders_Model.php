<?php


namespace App\Models\Admin;

use CodeIgniter\Model;

class Orders_Model extends Model
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

    public function get_all_orders()
    {
        $this->builder = $this->db->table('orders as o');
        $this->builder->join('ut_products as p' , 'o.product_id=p.id');
        $this->builder->join('ut_user as u' , 'o.user_id=u.id');
        $this->builder->join('ut_user_addresses as a' , 'o.address_id=a.id');
        $this->builder->select('o.*,p.title as product_title,p.price as product_price,u.first_name,u.last_name,u.email,a.*');
        $this->builder->orderBy('o.id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }
}


?>