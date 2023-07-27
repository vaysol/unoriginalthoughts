<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Specialities_Model;

class Specialities extends Controller
{
    public $session , $specialities_mode;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->specialities_mode = new Specialities_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['specialities'] =  $this->specialities_mode->get_all_specialities();

        echo view('Admin/header');
        echo view('Admin/Specialities/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['speciality_types'] =  $this->specialities_mode->get_all_speciality_type();
        $data['doctors'] =  $this->specialities_mode->get_all_dotors_speciality();

        echo view('Admin/header');
        echo view('Admin/Specialities/form',$data);
        echo view('Admin/footer');

    }

    public function edit( $id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['speciality_types'] =  $this->specialities_mode->get_all_speciality_type();
        $data['doctors'] =  $this->specialities_mode->get_all_dotors_speciality();

        $data['speciality'] =  $this->specialities_mode->get_speciality_by_id($id);

        $data['selected_speciality_types']  = explode(",",$data['speciality'][0]['speciality_type']) ; 
        $data['selected_doctors_id']  = explode(",",$data['speciality'][0]['doctor_id'] );
        
        echo view('Admin/header');
        echo view('Admin/Specialities/form',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->specialities_mode->delete_speciality($id);
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

            return redirect()->to(base_url('/admin/specialities'));
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

            if ($this->request->getFile('banner_image')) 
            {
                $image = $this->request->getFile('banner_image');
                $imageNameTrip = strrpos($_FILES['banner_image']['name'], ".");
                $imageName = substr($_FILES['banner_image']['name'], 0, $imageNameTrip);
                $destnpath = 'images/speciality-images/'.$imageName;
                if($_FILES['banner_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->specialities_mode->data['banner_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->specialities_mode->data['banner_image']) 
                {
                    unset($this->specialities_mode->data['banner_image']);
                }
            }

            if ($this->request->getFile('speciality_color_icon')) 
            {
                $image = $this->request->getFile('speciality_color_icon');
                $imageNameTrip = strrpos($_FILES['speciality_color_icon']['name'], ".");
                $imageName = substr($_FILES['speciality_color_icon']['name'], 0, $imageNameTrip);
                $destnpath = 'images/speciality-images/'.$imageName;
                if($_FILES['speciality_color_icon']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->specialities_mode->data['speciality_color_icon'] = $imageName != NULL ? $destnpath : '';
                if (!$this->specialities_mode->data['speciality_color_icon']) 
                {
                    unset($this->specialities_mode->data['speciality_color_icon']);
                }
            }

            if ($this->request->getFile('what_do_we_offer_image')) 
            {
                $image = $this->request->getFile('what_do_we_offer_image');
                $imageNameTrip = strrpos($_FILES['what_do_we_offer_image']['name'], ".");
                $imageName = substr($_FILES['what_do_we_offer_image']['name'], 0, $imageNameTrip);
                $destnpath = 'images/speciality-images/'.$imageName;
                if($_FILES['what_do_we_offer_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->specialities_mode->data['what_do_we_offer_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->specialities_mode->data['what_do_we_offer_image']) 
                {
                    unset($this->specialities_mode->data['what_do_we_offer_image']);
                }
            }

            if ($this->request->getFile('speciality_icon')) 
            {
                $image = $this->request->getFile('speciality_icon');
                $imageNameTrip = strrpos($_FILES['speciality_icon']['name'], ".");
                $imageName = substr($_FILES['speciality_icon']['name'], 0, $imageNameTrip);
                $destnpath = 'images/speciality-images/speciality-icon-images/'.$imageName;
                if($_FILES['speciality_icon']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->specialities_mode->data['speciality_icon'] = $imageName != NULL ? $destnpath : '';
                if (!$this->specialities_mode->data['speciality_icon']) 
                {
                    unset($this->specialities_mode->data['speciality_icon']);
                }
            }

            $this->specialities_mode->data['name'] = $this->request->getVar('name');
            $this->specialities_mode->data['title'] = $this->request->getVar('title');
            $this->specialities_mode->data['banner_image_text'] = $this->request->getVar('banner_image_text');
            $this->specialities_mode->data['banner_image_title'] = $this->request->getVar('banner_image_title');
            $this->specialities_mode->data['alt_text'] = $this->request->getVar('alt_text');
            $this->specialities_mode->data['title_text'] = $this->request->getVar('title_text');
            $this->specialities_mode->data['description'] = $this->request->getVar('description');
            $this->specialities_mode->data['wwo_image_text'] = $this->request->getVar('wwo_image_text');
            $this->specialities_mode->data['wwo_image_title'] = $this->request->getVar('wwo_image_title');
            $this->specialities_mode->data['wwo_title1'] = $this->request->getVar('wwo_title1');
            $this->specialities_mode->data['wwo_text1'] = $this->request->getVar('wwo_text1');
            $this->specialities_mode->data['wwo_title2'] = $this->request->getVar('wwo_title2');
            $this->specialities_mode->data['wwo_text2'] = $this->request->getVar('wwo_text2');
            $this->specialities_mode->data['offer_desc'] = $this->request->getVar('offer_desc');

            $this->specialities_mode->data['meta_title'] = $this->request->getVar('meta_title');
            $this->specialities_mode->data['meta_keywords'] = $this->request->getVar('meta_keywords');
            $this->specialities_mode->data['meta_description'] = $this->request->getVar('meta_description');
            $this->specialities_mode->data['h1_tag'] = $this->request->getVar('h1_tag');
            $this->specialities_mode->data['faq_script'] = $this->request->getVar('faq_script');
            $this->specialities_mode->data['display_order'] = $this->request->getVar('display_order');
            $this->specialities_mode->data['active_status'] = $this->request->getVar('active_status');
            $this->specialities_mode->data['speciality_type'] = implode(",", $this->request->getVar('speciality_type'));

            

            if($this->request->getVar('speciality_url'))
            {
                $this->specialities_mode->data['speciality_url'] = $this->request->getVar('speciality_url');

            }
            else
            {
                $this->specialities_mode->data['speciality_url'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ ]/', ' ', rtrim(strtolower($this->request->getVar('title')))));;
            }

            if ($this->request->getVar('doctor_id')) 
            {
                $this->specialities_mode->data['doctor_id'] = implode(",", $this->request->getVar('doctor_id'));
            } 
            else 
            {
                $this->specialities_mode->data['doctor_id'] = '';
            }


            //Add
            if (empty($this->request->getPost('speciality_id'))) 
            {
                
                $this->specialities_mode->data['last_modified_date'] = date('Y-m-d H:i:s');

                $isInsert = $this->specialities_mode->insert_speciality();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Speciality Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            }    

            //Edit
            else
            {
                $speciality_id  = $this->request->getVar('speciality_id');
                $this->specialities_mode->data['last_modified_date'] = date('Y-m-d H:i:s');
                $isUpdated = $this->specialities_mode->update_speciality($speciality_id );
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


            return redirect()->to(base_url('/admin/specialities'));
        }     

    }
}

?>