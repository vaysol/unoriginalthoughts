<?php 

namespace App\Controllers\Admin;

use App\Models\Admin\AdminRoles_Model;
use CodeIgniter\Controller;

class AdminRoles extends Controller
{

    public $session, $admin_roles_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->admin_roles_model = new AdminRoles_Model();
    }


    public function index()
    {

        if (empty($this->session->get('user_id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['admin_roles'] = $this->admin_roles_model->get_all_admin_roles();

        echo view('Admin/header');
        echo view('Admin/Admin-Roles/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/Admin-Roles/form');
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['admin_role'] = $this->admin_roles_model->get_admin_role_by_id($id);

        echo view('Admin/header');
        echo view('Admin/Admin-Roles/form',$data);
        echo view('Admin/footer');
    }


    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->admin_roles_model->delete_admin_role($id);
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

            return redirect()->to(base_url('/admin/admin-roles'));
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

            $this->admin_roles_model->data['role_name'] = $this->request->getVar('role_name');

            //Add
            if (empty($this->request->getPost('role_id'))) 
            {
                                
                $this->admin_roles_model->data['created_date'] = date('Y-m-d H:i:s');
                $this->admin_roles_model->data['created_by'] = session()->get('user_id');
                $this->admin_roles_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->admin_roles_model->data['last_modified_by'] = session()->get('user_id');

                $isInsert = $this->admin_roles_model->insert_admin_role();
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
                $userId = $this->request->getVar('role_id');
                $this->admin_roles_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->admin_roles_model->data['last_modified_by'] = session()->get('user_id');
                $isUpdated = $this->admin_roles_model->update_admin_role($userId);
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

            return redirect()->to(base_url('/admin/admin-roles'));
        }     
    }

    

}
?>