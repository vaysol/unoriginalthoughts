<?php


namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Jobs_Model;


class Jobs extends Controller
{


    public $session , $jobs_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->jobs_model = new Jobs_Model();
    }


    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['jobs'] =  $this->jobs_model->get_all_jobs_for_admin();

        echo view('Admin/header');
        echo view('Admin/Jobs/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/Jobs/form');
        echo view('Admin/footer');
        
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        
        $data['job'] =  $this->jobs_model->get_job_by_id($id);
        
        echo view('Admin/header');
        echo view('Admin/Jobs/form',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->jobs_model->delete_job($id);
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

            return redirect()->to(base_url('/admin/jobs'));
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

            $this->jobs_model->data['role'] = $this->request->getVar('role');
            $this->jobs_model->data['country_location'] = $this->request->getVar('country_location');
            $this->jobs_model->data['category'] = $this->request->getVar('category');
            $this->jobs_model->data['experience'] = $this->request->getVar('experience');
            $this->jobs_model->data['qualification'] = $this->request->getVar('qualification');
            $this->jobs_model->data['objective'] = $this->request->getVar('objective');
            $this->jobs_model->data['description'] = $this->request->getVar('description');
            $this->jobs_model->data['meta_description'] = $this->request->getVar('meta_description');
            $this->jobs_model->data['address'] = $this->request->getVar('address');
            $this->jobs_model->data['location'] = $this->request->getVar('location');
            $this->jobs_model->data['postal_code'] = $this->request->getVar('postal_code');
            $this->jobs_model->data['status'] = $this->request->getVar('status');
            //Add
            if (empty($this->request->getPost('id'))) 
            {
                $this->jobs_model->data['created_date'] =date('Y-m-d H:i:s');
                $this->jobs_model->data['created_by'] = session()->get('user_id');
                $this->jobs_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->jobs_model->data['last_modified_by'] = session()->get('user_id');

                $isInsert = $this->jobs_model->insert_into_job();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Job Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            } 
            else
            {
                $id  = $this->request->getVar('id');
                $this->jobs_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->jobs_model->data['last_modified_by'] = session()->get('user_id');
                $isUpdated = $this->jobs_model->update_job($id );
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

            return redirect()->to(base_url('/admin/jobs'));
        }

    }
}
?>