<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Blogs_Model;
use CodeIgniter\Controller;


class Blogs extends Controller
{

    public $session , $blogs_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->blogs_model = new Blogs_Model;
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['blogs'] =  $this->blogs_model->get_all_blogs();

        echo view('Admin/header');
        echo view('Admin/Blogs/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['blog_categories']  = $this->blogs_model->select_all_blog_categories(); 
        $data['doctors']  = $this->blogs_model->select_all_doctors(); 


        echo view('Admin/header');
        echo view('Admin/Blogs/form' ,$data);
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        
        $data['blog_categories']  = $this->blogs_model->select_all_blog_categories(); 
        $data['doctors']  = $this->blogs_model->select_all_doctors(); 
        $data['blog'] = $this->blogs_model->get_blog_by_id($id);

        $data['selected_blog_category_id']  = explode(",",$data['blog'][0]['blog_category']) ; 
        $data['selected_doctor_id']  = explode(",",$data['blog'][0]['doctor_id'] );
        
        echo view('Admin/header');
        echo view('Admin/Blogs/form',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->blogs_model->delete_blog($id);
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

            return redirect()->to(base_url('/admin/blogs'));
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

            if ($this->request->getFile('blog_image')) 
            {
                $image = $this->request->getFile('blog_image');
                $imageNameTrip = strrpos($_FILES['blog_image']['name'], ".");
                $imageName = substr($_FILES['blog_image']['name'], 0, $imageNameTrip);
                $destnpath = 'images/blog-images/'.$imageName;
                if($_FILES['blog_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->blogs_model->data['blog_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->blogs_model->data['blog_image']) 
                {
                    unset($this->blogs_model->data['blog_image']);
                }
            }

            if ($this->request->getFile('inner_image')) 
            {
                $image = $this->request->getFile('inner_image');
                $imageNameTrip = strrpos($_FILES['inner_image']['name'], ".");
                $imageName = substr($_FILES['inner_image']['name'], 0, $imageNameTrip);
                $destnpath = 'images/blog-images/blog-inner-images/'.$imageName;
                if($_FILES['inner_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->blogs_model->data['inner_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->blogs_model->data['inner_image']) 
                {
                    unset($this->blogs_model->data['inner_image']);
                }
            }
            
            $this->blogs_model->data['blog_h1_tag'] = $this->request->getVar('blog_h1_tag');
            $this->blogs_model->data['blog_title'] = $this->request->getVar('blog_title');
            $this->blogs_model->data['blog_category'] = $this->request->getVar('blog_category');
            $this->blogs_model->data['meta_title'] = $this->request->getVar('meta_title');
            $this->blogs_model->data['meta_keywords'] = $this->request->getVar('meta_keywords');
            $this->blogs_model->data['meta_description'] = $this->request->getVar('meta_description');
            $this->blogs_model->data['alt_text'] = $this->request->getVar('alt_text');
            $this->blogs_model->data['title_text'] = $this->request->getVar('title_text');
            $this->blogs_model->data['published_date'] = $this->request->getVar('published_date');
            if ($this->request->getVar('doctor_id')) 
            {
                $this->blogs_model->data['doctor_id'] = implode(",", $this->request->getVar('doctor_id'));
            } 
            else 
            {
                $this->blogs_model->data['doctor_id'] = '';
            }


            if($this->request->getVar('blog_slug'))
            {
                $this->blogs_model->data['blog_slug'] = $this->request->getVar('blog_slug');

            }
            else
            {
                $this->blogs_model->data['blog_slug'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ ]/', ' ', rtrim(strtolower($this->request->getVar('blog_title')))));;
            }
            $this->blogs_model->data['details'] = $this->request->getVar('details');
            $this->blogs_model->data['canonical_tag'] = $this->request->getVar('canonical_tag');
            $this->blogs_model->data['display_order'] = $this->request->getVar('display_order');
            $this->blogs_model->data['homepage_display_order'] = $this->request->getVar('homepage_display_order');
            $this->blogs_model->data['status_ind'] = $this->request->getVar('status_ind');

            //Add
            if (empty($this->request->getPost('blog_id'))) 
            {
                
                $this->blogs_model->data['created_by'] = session()->get('user_id');
                $this->blogs_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->blogs_model->data['last_modified_by'] = session()->get('user_id');

                $isInsert = $this->blogs_model->insert_blog();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Blog Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            }    
            //Edit
            else
            {
                $blog_id  = $this->request->getVar('blog_id');
                $this->blogs_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->blogs_model->data['last_modified_by'] = session()->get('user_id');
                $isUpdated = $this->blogs_model->update_blog($blog_id );
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


      

            return redirect()->to(base_url('/admin/blogs'));



        }
    }

}

?>