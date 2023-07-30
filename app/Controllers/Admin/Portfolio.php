<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Portfolio_Model;

class Portfolio extends Controller
{
    public $session , $portfolio_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->portfolio_model = new Portfolio_Model();
    }

    public function index()
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['portfolios'] =  $this->portfolio_model->get_all_portfolio();

        echo view('Admin/header');
        echo view('Admin/Portfolio/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/Portfolio/form');
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }
        
        $data['portfolio'] = $this->portfolio_model->get_portfolio_by_id($id);

        echo view('Admin/header');
        echo view('Admin/Portfolio/form',$data);
        echo view('Admin/footer');
    }

    

    public function delete($id)
    {

        if (session()->get('id'))
        {
            $query = $this->portfolio_model->delete_portfolio($id);
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

            return redirect()->to(base_url('/admin/portfolios'));
        } 
        else 
        {
            return redirect()->to(base_url('/admin/login'));
        }
    }


    function save() 
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
                $destnpath = 'dynamic_images/portfolio-images/'.$imageName;
                if($_FILES['desktop_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->portfolio_model->data['desktop_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->portfolio_model->data['desktop_image']) 
                {
                    unset($this->portfolio_model->data['desktop_image']);
                }
            }

            if ($this->request->getFile('mobile_image')) {
                $image = $this->request->getFile('mobile_image');
                $imageNameTrip = strrpos($_FILES['mobile_image']['name'], ".");
                $imageName = substr($_FILES['mobile_image']['name'], 0, $imageNameTrip);
                $destnpath = 'dynamic_images/portfolio-images/'.$imageName;
                if($_FILES['mobile_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->portfolio_model->data['mobile_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->portfolio_model->data['mobile_image']) 
                {
                    unset($this->portfolio_model->data['mobile_image']);
                }
            }

            $this->portfolio_model->data['title'] = $this->request->getVar('title');
            $this->portfolio_model->data['priority'] = $this->request->getVar('priority');
            $this->portfolio_model->data['alt_text'] = $this->request->getVar('alt_text');
            $this->portfolio_model->data['title_text'] = $this->request->getVar('title_text');
            $this->portfolio_model->data['status'] = $this->request->getVar('status');

             //Add
        if (empty($this->request->getPost('id'))) 
        {
            
            $this->portfolio_model->data['create_date'] = date('Y-m-d H:i:s');
            $this->portfolio_model->data['created_by'] = session()->get('id');
            $this->portfolio_model->data['modified_date'] = date('Y-m-d H:i:s');
            $this->portfolio_model->data['modified_by'] = session()->get('id');

            $isInsert = $this->portfolio_model->insert_portfolio();
            if ($isInsert) {
                $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Portfolio Added Successfully');
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
            $this->portfolio_model->data['modified_date'] = date('Y-m-d H:i:s');
            $this->portfolio_model->data['modified_by'] = session()->get('id');
            $isUpdated = $this->portfolio_model->update_portfolio($id);
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
            return redirect()->to(base_url('/admin/portfolios'));
        }
        
    }
}
?>