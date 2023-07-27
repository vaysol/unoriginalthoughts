<?php

namespace App\Controllers\Admin;

use App\Models\Admin\AdminUser_Model;
use CodeIgniter\Controller;

class AdminUser extends Controller
{

    public $session, $admin_user_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->admin_user_model = new AdminUser_Model;
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['admin_users'] = $this->admin_user_model->get_all_admin_users();

        echo view('Admin/header');
        echo view('Admin/Admin-Users/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['admin_roles'] = $this->admin_user_model->get_all_admin_roles();
        $data['admin_menu_items'] = $this->admin_user_model->get_all_admin_menu_item();
        echo view('Admin/header');
        echo view('Admin/Admin-Users/form' ,$data);
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['admin_user'] = $this->admin_user_model->get_admin_user_by_id($id);
        $data['admin_roles'] = $this->admin_user_model->get_all_admin_roles();
        $data['admin_menu_items'] = $this->admin_user_model->get_all_admin_menu_item();
        $data['selected_role_name'] = explode(",", $data['admin_user'][0]['role_id']);
        $data['selected_menu_items'] = explode(",", $data['admin_user'][0]['admin_menu_item_id']);
        echo view('Admin/header');
        echo view('Admin/Admin-Users/form', $data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->admin_user_model->delete_admin_user($id);
            if ($query) 
            {
                $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Deleted Successfully');
                session()->setFlashdata('msg', $msg);
            } 
            else 
            {
                $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable Delete.');
                session()->setFlashdata('msg', $msg);
            }

            return redirect()->to(base_url('/admin/admin-users'));
        } 
        else 
        {
            return redirect()->to(base_url('/admin/login'));
        }
    }

    public function save()
    {
        if ($this->request->getMethod() == 'post') 
        {

            if (empty($this->session->get('user_id'))) 
            {
                return redirect()->to(base_url('/admin/login'));
            }
        
            $this->admin_user_model->data['first_name'] = $this->request->getVar('first_name');
            $this->admin_user_model->data['last_name'] = $this->request->getVar('last_name');
            $this->admin_user_model->data['email'] = $this->request->getVar('email');
            $this->admin_user_model->data['role_id'] = $this->request->getVar('role_id');
            if ($this->request->getVar('admin_menu_item_id')) 
            {
                $this->admin_user_model->data['admin_menu_item_id'] = implode(",", $this->request->getVar('admin_menu_item_id'));
            } 
            else 
            {
                $this->admin_user_model->data['admin_menu_item_id'] = '';
            }
            $this->admin_user_model->data['status_ind'] = $this->request->getVar('status_ind');
            $this->admin_user_model->data['username'] = $this->request->getVar('username');

            if(!empty( trim($this->request->getVar('password'))))
            {
                $this->admin_user_model->data['password'] = md5($this->request->getVar('password'));
            }

            //Add
            if (empty($this->request->getPost('user_id'))) 
            {
                
                $this->admin_user_model->data['created_date'] = date('Y-m-d H:i:s');
                $this->admin_user_model->data['created_by'] = session()->get('user_id');
                $this->admin_user_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->admin_user_model->data['last_modified_by'] = session()->get('user_id');

                $isInsert = $this->admin_user_model->insert_admin_user();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Admin User Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            }    
            //Edit
            else
            {
                $userId = $this->request->getVar('user_id');
                $this->admin_user_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->admin_user_model->data['last_modified_by'] = session()->get('user_id');
                $isUpdated = $this->admin_user_model->update_admin_user($userId);
                if ($isUpdated) 
                {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Updated Successfully');
                    session()->setFlashdata('msg', $msg);
                } else 
                {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Update.');
                    session()->setFlashdata('msg', $msg);
                }

            }

            return redirect()->to(base_url('/admin/admin-users'));

        }
    }    
}

?>