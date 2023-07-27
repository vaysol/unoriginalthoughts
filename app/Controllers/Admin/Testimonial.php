<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Testimonials_Model;
use CodeIgniter\Controller;

class Testimonial extends Controller
{
    public $session , $testimonials_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->testimonials_model = new Testimonials_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['testimonials'] = $this->testimonials_model->get_all_testimonials();

        echo view('Admin/header');
        echo view('Admin/Testimonials/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/Testimonials/form');
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['testimonial'] = $this->testimonials_model->get_testimonial_by_id($id);

        echo view('Admin/header');
        echo view('Admin/Testimonials/form',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->testimonials_model->delete_testimonial($id);
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

            return redirect()->to(base_url('/admin/testimonials'));
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

            $this->testimonials_model->data['testimonial_title'] = $this->request->getVar('testimonial_title');
            $this->testimonials_model->data['youtube_url'] = $this->request->getVar('youtube_url');
            $this->testimonials_model->data['testimonial_type'] = $this->request->getVar('testimonial_type');
            $this->testimonials_model->data['testimonial_short_desc'] = $this->request->getVar('testimonial_short_desc');
            $this->testimonials_model->data['age'] = $this->request->getVar('age');
            $this->testimonials_model->data['display_order'] = $this->request->getVar('display_order');
            $this->testimonials_model->data['home_display_order'] = $this->request->getVar('home_display_order');
            $this->testimonials_model->data['status_ind'] = $this->request->getVar('status_ind');


            //Add
            if (empty($this->request->getPost('testimonial_id'))) 
            {
                $this->testimonials_model->data['created_date'] =date('Y-m-d H:i:s');
                $this->testimonials_model->data['last_modified_date'] = date('Y-m-d H:i:s');

                $isInsert = $this->testimonials_model->insert_testimonial();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Testimonial  Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            }  
            //Edit
            {
                $testimonial_id  = $this->request->getVar('testimonial_id');
                $this->testimonials_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $isUpdated = $this->testimonials_model->update_testimonial($testimonial_id );
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

        return redirect()->to(base_url('/admin/testimonials'));



        }    
    }
}

?>