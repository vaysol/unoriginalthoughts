<?php


namespace App\Models\Admin;

use CodeIgniter\Model;

class Subscription_model extends Model
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

    public function get_all_subscribe()
    {
        $this->builder = $this->db->table('subscribe');
        $this->builder->select('*');
        $this->builder->orderBy('id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }


    public function delete_subscribe($id)
    {
        $data = [
            'del_flag' => "Y"
        ];
        $this->builder = $this->db->table( 'subscribe' );
        $this->builder->where( 'id', $id );
        $query = $this->builder->update($data);
        return $query;
    }

}
?>