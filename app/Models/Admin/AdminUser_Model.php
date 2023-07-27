<?php 


namespace App\Models\Admin;


use CodeIgniter\Model;

class AdminUser_Model extends Model
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

    
    public function get_all_admin_users()
    { 
        $this->builder = $this->db->table('admin_users as au');
        $this->builder->join('admin_roles as ar', 'ar.role_id = au.role_id', 'left');
        $this->builder->select('au.user_id,au.username,au.password,au.first_name,au.last_name,au.email,au.status_ind,au.created_date,au.last_modified_date,au.created_by,au.last_modified_by,ar.role_name');
        $this->builder->orderBy('user_id' ,'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_all_admin_roles()
    {
        $this->builder = $this->db->table('admin_roles');
        $this->builder->select('*');
        $this->builder->where('status_ind' , 1);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_all_admin_menu_item()
    {
        $this->builder = $this->db->table('admin_menuitems');
        $this->builder->select('*');
        $this->builder->where('status_ind' , 1);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_admin_user_by_id($user_id)
    {
        $this->builder = $this->db->table('admin_users');
        $this->builder->select('*');
        $this->builder->where('user_id', $user_id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_admin_user()
    {
        $this->builder = $this->db->table('admin_users');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_admin_user($id)
    {
        $this->builder = $this->db->table('admin_users');
        $this->builder->where('user_id', $id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_admin_user($id)
    {
        $this->builder = $this->db->table( 'admin_users' );
        $this->builder->where( 'user_id', $id );
        $query = $this->builder->delete();
        return $query;
    }

}

?>