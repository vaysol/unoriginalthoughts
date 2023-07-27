<?php


namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminRoles_Model extends Model
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

    public function get_all_admin_roles()
    {
        $this->builder = $this->db->table('admin_roles');
        $this->builder->select('*');
        $this->builder->orderBy('role_id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_admin_role_by_id($role_id)
    {
        $this->builder = $this->db->table('admin_roles');
        $this->builder->select('*');
        $this->builder->where('role_id',$role_id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_admin_role()
    {
        $this->builder = $this->db->table('admin_roles');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_admin_role($role_id)
    {
        $this->builder = $this->db->table('admin_roles');
        $this->builder->where('role_id', $role_id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_admin_role($role_id)
    {
        $this->builder = $this->db->table( 'admin_roles' );
        $this->builder->where( 'role_id', $role_id );
        $query = $this->builder->delete();
        return $query;
    }

    
}

?>