<?php


namespace App\Models\Admin;

use CodeIgniter\Model;

class PartnerWithUs_Model extends Model
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

    public function get_all_partner_with_us()
    {
        $this->builder = $this->db->table('partner_with_us');
        $this->builder->select('*');
        $this->builder->where('del_flag' , 'N');
        $this->builder->orderBy('id' , 'Desc');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }


    public function delete_partner_with_us($id)
    {
        $data = [
            'del_flag' => "Y"
        ];
        $this->builder = $this->db->table( 'partner_with_us');
        $this->builder->where( 'id', $id );
        $query = $this->builder->update($data);
        return $query;
    }

}
?>