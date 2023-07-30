<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\ProductCategory_Model;


class ProductCategory extends Controller
{
    public $session , $product_category_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->product_category_model = new ProductCategory_Model();
    }

    public function index()
    {
        
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['product_categories'] =  $this->product_category_model->get_all_product_categories();

        echo view('Admin/header');
        echo view('Admin/ProductCategories/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/ProductCategories/form');
        echo view('Admin/footer');
    }
    
    public function edit($id)
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }
        
        $data['product_category'] = $this->product_category_model->get_product_category_by_id($id);

        echo view('Admin/header');
        echo view('Admin/ProductCategories/form',$data);
        echo view('Admin/footer');
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
                    $destnpath = 'dynamic_images/product-categories-images/'.$imageName;
                    if($_FILES['desktop_image']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->product_category_model->data['desktop_image'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->product_category_model->data['desktop_image']) 
                    {
                        unset($this->product_category_model->data['desktop_image']);
                    }
                }

                if ($this->request->getFile('mobile_image')) {
                    $image = $this->request->getFile('mobile_image');
                    $imageNameTrip = strrpos($_FILES['mobile_image']['name'], ".");
                    $imageName = substr($_FILES['mobile_image']['name'], 0, $imageNameTrip);
                    $destnpath = 'dynamic_images/product-categories-images/'.$imageName;
                    if($_FILES['mobile_image']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->product_category_model->data['mobile_image'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->product_category_model->data['mobile_image']) 
                    {
                        unset($this->product_category_model->data['mobile_image']);
                    }
                }

                $this->product_category_model->data['title'] = $this->request->getVar('title');
                $this->product_category_model->data['priority'] = $this->request->getVar('priority');
                $this->product_category_model->data['alt_text'] = $this->request->getVar('alt_text');
                $this->product_category_model->data['title_text'] = $this->request->getVar('title_text');
                $this->product_category_model->data['status'] = $this->request->getVar('status');

                 //Add
            if (empty($this->request->getPost('id'))) 
            {
                
                $this->product_category_model->data['create_date'] = date('Y-m-d H:i:s');
                $this->product_category_model->data['created_by'] = session()->get('id');
                $this->product_category_model->data['modified_date'] = date('Y-m-d H:i:s');
                $this->product_category_model->data['modified_by'] = session()->get('id');

                $isInsert = $this->product_category_model->insert_product_category();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Product Category Added Successfully');
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
                $this->product_category_model->data['modified_date'] = date('Y-m-d H:i:s');
                $this->product_category_model->data['modified_by'] = session()->get('id');
                $isUpdated = $this->product_category_model->update_product_category($id);
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

            return redirect()->to(base_url('/admin/product-categories'));



            }
        
    }




}
?>
