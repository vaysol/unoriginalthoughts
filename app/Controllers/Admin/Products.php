<?php 

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Products_Model;
use App\Models\Admin\ProductCategory_Model;

class Products extends Controller
{
    public $session , $products_model ,$productcategory_model ; 

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->products_model = new Products_Model();
        $this->productcategory_model = new ProductCategory_Model();
    }

    public function index()
    {
        
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['products'] =  $this->products_model->get_all_products();

        echo view('Admin/header');
        echo view('Admin/Products/index',$data);
        echo view('Admin/footer');
       
    }

    public function add()
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['product_categories'] = $this->productcategory_model->get_all_product_categories();

        echo view('Admin/header');
        echo view('Admin/Products/form' , $data);
        echo view('Admin/footer');

    }

    public function edit($id)
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['product_categories'] = $this->productcategory_model->get_all_product_categories();
        
        $data['product'] = $this->products_model->get_product_by_id($id);

        if($data['product'][0]['category_id'])
        {
            $data['selected_category_id'] = explode(",",$data['product'][0]['category_id']) ; 
        }

        echo view('Admin/header');
        echo view('Admin/Products/form',$data);
        echo view('Admin/footer');

    }

    public function delete($id)
    {

        if (session()->get('id'))
        {
            $query = $this->products_model->delete_products($id);
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

            return redirect()->to(base_url('/admin/products'));
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
                    $destnpath = 'dynamic_images/product-images/'.$imageName;
                    if($_FILES['image']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->products_model->data['image'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->products_model->data['image']) 
                    {
                        unset($this->products_model->data['image']);
                    }
                }

                if ($this->request->getFile('image_1')) {
                    $image = $this->request->getFile('image_1');
                    $imageNameTrip = strrpos($_FILES['image_1']['name'], ".");
                    $imageName = substr($_FILES['image_1']['name'], 0, $imageNameTrip);
                    $destnpath = 'dynamic_images/product-images/'.$imageName;
                    if($_FILES['image_1']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->products_model->data['image_1'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->products_model->data['image_1']) 
                    {
                        unset($this->products_model->data['image_1']);
                    }
                }

                if ($this->request->getFile('image_2')) {
                    $image = $this->request->getFile('image_2');
                    $imageNameTrip = strrpos($_FILES['image_2']['name'], ".");
                    $imageName = substr($_FILES['image_2']['name'], 0, $imageNameTrip);
                    $destnpath = 'dynamic_images/product-images/'.$imageName;
                    if($_FILES['image_2']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->products_model->data['image_2'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->products_model->data['image_2']) 
                    {
                        unset($this->products_model->data['image_2']);
                    }
                }

                if ($this->request->getFile('image_3')) {
                    $image = $this->request->getFile('image_3');
                    $imageNameTrip = strrpos($_FILES['image_3']['name'], ".");
                    $imageName = substr($_FILES['image_3']['name'], 0, $imageNameTrip);
                    $destnpath = 'dynamic_images/product-images/'.$imageName;
                    if($_FILES['image_3']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->products_model->data['image_3'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->products_model->data['image_3']) 
                    {
                        unset($this->products_model->data['image_3']);
                    }
                }

                if ($this->request->getFile('image_4')) {
                    $image = $this->request->getFile('image_4');
                    $imageNameTrip = strrpos($_FILES['image_4']['name'], ".");
                    $imageName = substr($_FILES['image_4']['name'], 0, $imageNameTrip);
                    $destnpath = 'dynamic_images/product-images/'.$imageName;
                    if($_FILES['image_4']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->products_model->data['image_4'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->products_model->data['image_4']) 
                    {
                        unset($this->products_model->data['image_4']);
                    }
                }

                if ($this->request->getFile('image_5')) {
                    $image = $this->request->getFile('image_5');
                    $imageNameTrip = strrpos($_FILES['image_5']['name'], ".");
                    $imageName = substr($_FILES['image_5']['name'], 0, $imageNameTrip);
                    $destnpath = 'dynamic_images/product-images/'.$imageName;
                    if($_FILES['image_5']['name'])
                    {
                        webp_image_with_transperent($destnpath,$image );
                    }
                    $this->products_model->data['image_5'] = $imageName != NULL ? $destnpath : '';
                    if (!$this->products_model->data['image_5']) 
                    {
                        unset($this->products_model->data['image_5']);
                    }
                }

                $this->products_model->data['title'] = $this->request->getVar('title');
                $this->products_model->data['priority'] = $this->request->getVar('priority');

                $this->products_model->data['image_description'] = $this->request->getVar('image_description');
                $this->products_model->data['image_description_1'] = $this->request->getVar('image_description_1');
                $this->products_model->data['image_description_2'] = $this->request->getVar('image_description_2');
                $this->products_model->data['image_description_3'] = $this->request->getVar('image_description_3');
                $this->products_model->data['image_description_4'] = $this->request->getVar('image_description_4');
                $this->products_model->data['image_description_5'] = $this->request->getVar('image_description_5');

                $this->products_model->data['price'] = $this->request->getVar('price');
                $this->products_model->data['price_1'] = $this->request->getVar('price_1');
                $this->products_model->data['price_2'] = $this->request->getVar('price_2');
                $this->products_model->data['price_3'] = $this->request->getVar('price_3');
                $this->products_model->data['price_4'] = $this->request->getVar('price_4');
                $this->products_model->data['price_5'] = $this->request->getVar('price_5');

                $this->products_model->data['category_id'] = implode(",", $this->request->getVar('category_id'));


                $this->products_model->data['on_sale'] = $this->request->getVar('on_sale');


                if(!empty(trim($this->request->getVar('slug'))))
                {
                    $this->products_model->data['slug'] = $this->request->getVar('slug');
    
                }
                else
                {
                    $this->products_model->data['slug'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ ]/', ' ', rtrim(strtolower($this->request->getVar('title')))));;
                }

                $this->products_model->data['alt_text'] = $this->request->getVar('alt_text');
                $this->products_model->data['title_text'] = $this->request->getVar('title_text');
                $this->products_model->data['status'] = $this->request->getVar('status');

                 //Add
            if (empty($this->request->getPost('id'))) 
            {
                
                $this->products_model->data['create_date'] = date('Y-m-d H:i:s');
                $this->products_model->data['created_by'] = session()->get('id');
                $this->products_model->data['modified_date'] = date('Y-m-d H:i:s');
                $this->products_model->data['modified_by'] = session()->get('id');

                $isInsert = $this->products_model->insert_product();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Product Added Successfully');
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
                $this->products_model->data['modified_date'] = date('Y-m-d H:i:s');
                $this->products_model->data['modified_by'] = session()->get('id');
                $isUpdated = $this->products_model->update_product($id);
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
                return redirect()->to(base_url('/admin/products'));
            }
                   

    }


}    


?>