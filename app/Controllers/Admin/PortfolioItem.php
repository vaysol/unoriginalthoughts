<?php

namespace App\Controllers\Admin;
use CodeIgniter\Controller;
use App\Models\Admin\PortfolioItem_Model;
use App\Models\Admin\Portfolio_Model;

class PortfolioItem extends Controller
{
    public $session , $portfolio_item_model , $portfolio_model ; 

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->portfolio_item_model = new PortfolioItem_Model();
        $this->portfolio_model = new Portfolio_Model();
    }

    public function index()
    {
        
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['portfolio_items'] =  $this->portfolio_item_model->get_all_portfolio_items();

        echo view('Admin/header');
        echo view('Admin/PortfolioItem/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['portfolios'] =  $this->portfolio_model->get_all_portfolio();

        echo view('Admin/header');
        echo view('Admin/PortfolioItem/form' , $data);
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['portfolios'] =  $this->portfolio_model->get_all_portfolio();
        
        $data['portfolio_item'] = $this->portfolio_item_model->get_portfolio_item_by_id($id);

        if($data['portfolio_item'][0]['portfolio_id'])
        {
            $data['selected_portfolio_id'] = explode(",",$data['portfolio_item'][0]['portfolio_id']) ; 
        }

        echo view('Admin/header');
        echo view('Admin/PortfolioItem/form',$data);
        echo view('Admin/footer');

    }

    public function delete($id)
    {

        if (session()->get('id'))
        {
            $query = $this->portfolio_item_model->delete_portfolio_item($id);
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

            return redirect()->to(base_url('/admin/portfolio-items'));
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

                if ($this->request->getFile('image')) 
                {
                    $image = $this->request->getFile('image');
                    $imageNameTrip = strrpos($_FILES['image']['name'], ".");
                    $imageName = substr($_FILES['image']['name'], 0, $imageNameTrip);
                    $destnpath = 'dynamic_images/portfolio-item-images/'.$imageName;
                    if($_FILES['image']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->portfolio_item_model->data['image'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->portfolio_item_model->data['image']) 
                    {
                        unset($this->portfolio_item_model->data['image']);
                    }
                }

                $this->portfolio_item_model->data['title'] = $this->request->getVar('title');
                $this->portfolio_item_model->data['priority'] = $this->request->getVar('priority');
                $this->portfolio_item_model->data['image_description'] = $this->request->getVar('image_description');

                $this->portfolio_item_model->data['portfolio_id'] = implode(",", $this->request->getVar('portfolio_id'));


                if(!empty(trim($this->request->getVar('slug'))))
                {
                    $this->portfolio_item_model->data['slug'] = $this->request->getVar('slug');
    
                }
                else
                {
                    $this->portfolio_item_model->data['slug'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ ]/', ' ', rtrim(strtolower($this->request->getVar('title')))));;
                }

                $this->portfolio_item_model->data['alt_text'] = $this->request->getVar('alt_text');
                $this->portfolio_item_model->data['title_text'] = $this->request->getVar('title_text');
                $this->portfolio_item_model->data['status'] = $this->request->getVar('status');

                 //Add
            if (empty($this->request->getPost('id'))) 
            {
                
                $this->portfolio_item_model->data['create_date'] = date('Y-m-d H:i:s');
                $this->portfolio_item_model->data['created_by'] = session()->get('id');
                $this->portfolio_item_model->data['modified_date'] = date('Y-m-d H:i:s');
                $this->portfolio_item_model->data['modified_by'] = session()->get('id');

                $isInsert = $this->portfolio_item_model->insert_portfolio_item();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Product Item Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add');
                    session()->setFlashdata('msg', $msg);
                }
            }    
            //Edit
            else
            {
                $id = $this->request->getVar('id');
                $this->portfolio_item_model->data['modified_date'] = date('Y-m-d H:i:s');
                $this->portfolio_item_model->data['modified_by'] = session()->get('id');
                $isUpdated = $this->portfolio_item_model->update_portfolio_item($id);
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
                return redirect()->to(base_url('/admin/portfolio-items'));
            }      
    }
}
?>