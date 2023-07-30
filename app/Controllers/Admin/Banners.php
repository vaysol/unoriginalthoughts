<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Banners_Model;
use CodeIgniter\Controller;

class Banners extends Controller

{
    
    public $session , $banners_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->banners_model = new Banners_Model();
    }

    public function index()
    {
        
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['banners'] =  $this->banners_model->get_all_banners();

        echo view('Admin/header');
        echo view('Admin/Banners/index',$data);
        echo view('Admin/footer');
       
    }


    public function add()
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/Banners/form');
        echo view('Admin/footer');

    }

    public function edit($id)
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }
        
        $data['banner'] = $this->banners_model->get_banner_by_id($id);

        echo view('Admin/header');
        echo view('Admin/Banners/form',$data);
        echo view('Admin/footer');

    }


    public function delete($id)
    {

        if (session()->get('id'))
        {
            $query = $this->banners_model->delete_banner($id);
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

            return redirect()->to(base_url('/admin/banners'));
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

                if (empty($this->session->get('id'))) 
                {
                    return redirect()->to(base_url('/admin/login'));
                }

                if ($this->request->getFile('desktop_image')) 
                {
                    $image = $this->request->getFile('desktop_image');
                    $imageNameTrip = strrpos($_FILES['desktop_image']['name'], ".");
                    $imageName = substr($_FILES['desktop_image']['name'], 0, $imageNameTrip);
                    $destnpath = 'dynamic_images/banner-images/'.$imageName;
                    if($_FILES['desktop_image']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->banners_model->data['desktop_image'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->banners_model->data['desktop_image']) 
                    {
                        unset($this->banners_model->data['desktop_image']);
                    }
                }

                if ($this->request->getFile('mobile_image')) {
                    $image = $this->request->getFile('mobile_image');
                    $imageNameTrip = strrpos($_FILES['mobile_image']['name'], ".");
                    $imageName = substr($_FILES['mobile_image']['name'], 0, $imageNameTrip);
                    $destnpath = 'dynamic_images/banner-images/'.$imageName;
                    if($_FILES['mobile_image']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->banners_model->data['mobile_image'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->banners_model->data['mobile_image']) 
                    {
                        unset($this->banners_model->data['mobile_image']);
                    }
                }

                $this->banners_model->data['title'] = $this->request->getVar('title');
                $this->banners_model->data['priority'] = $this->request->getVar('priority');
                $this->banners_model->data['alt_text'] = $this->request->getVar('alt_text');
                $this->banners_model->data['title_text'] = $this->request->getVar('title_text');
                $this->banners_model->data['button_link'] = $this->request->getVar('button_link');
                $this->banners_model->data['status'] = $this->request->getVar('status');

                 //Add
            if (empty($this->request->getPost('id'))) 
            {
                
                $this->banners_model->data['create_date'] = date('Y-m-d H:i:s');
                $this->banners_model->data['created_by'] = session()->get('id');
                $this->banners_model->data['modified_date'] = date('Y-m-d H:i:s');
                $this->banners_model->data['modified_by'] = session()->get('id');

                $isInsert = $this->banners_model->insert_banner();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Banner Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            }    
            //Edit
            else
            {
                $id = $this->request->getVar('id');
                $this->banners_model->data['modified_date'] = date('Y-m-d H:i:s');
                $this->banners_model->data['modified_by'] = session()->get('id');
                $isUpdated = $this->banners_model->update_banner($id);
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

            return redirect()->to(base_url('/admin/banners'));



            }
                   

    }
}


?>