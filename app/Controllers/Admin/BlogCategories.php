<?php

namespace App\Controllers\Admin;

use App\Models\Admin\BlogCategories_Model;
use CodeIgniter\Controller;

class BlogCategories extends Controller
{
    public $session , $blog_categories_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->blog_categories_model = new BlogCategories_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['blog_categories'] =  $this->blog_categories_model->get_all_blog_categories();

        echo view('Admin/header');
        echo view('Admin/Blog-Categories/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/Blog-Categories/form');
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['blog_category'] =  $this->blog_categories_model->get_blog_category_by_id($id);

        echo view('Admin/header');
        echo view('Admin/Blog-Categories/form',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->blog_categories_model->delete_blog_category($id);
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

            return redirect()->to(base_url('/admin/blog-categories'));
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

            $this->blog_categories_model->data['blog_category_title'] = $this->request->getVar('blog_category_title');
            
            if($this->request->getVar('blog_category_slug'))
            {
                $this->blog_categories_model->data['blog_category_slug'] = $this->request->getVar('blog_category_slug');
            }
            {
                $this->blog_categories_model->data['blog_category_slug'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ ]/', ' ', rtrim(strtolower($this->request->getVar('blog_category_title')))));;
            }

            $this->blog_categories_model->data['active_status'] = $this->request->getVar('active_status');

            //Add
            if (empty($this->request->getPost('blog_category_id'))) 
            {
                
                $this->blog_categories_model->data['created_date'] =date('Y-m-d H:i:s');
                $this->blog_categories_model->data['created_by'] = session()->get('user_id');
                $this->blog_categories_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->blog_categories_model->data['last_modified_by'] = session()->get('user_id');

                $isInsert = $this->blog_categories_model->insert_blog_category();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Blog Category Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            }    
            else
            {
                $blog_category_id  = $this->request->getVar('blog_category_id');
                $this->blog_categories_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->blog_categories_model->data['last_modified_by'] = session()->get('user_id');
                $isUpdated = $this->blog_categories_model->update_blog_category($blog_category_id );
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
            return redirect()->to(base_url('/admin/blog-categories'));
        }     
    }
}
?>