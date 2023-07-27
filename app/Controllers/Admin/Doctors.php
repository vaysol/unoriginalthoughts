<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Doctors_Model;
use CodeIgniter\Controller;

class Doctors extends Controller
{
    public $session , $doctors_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->doctors_model = new Doctors_Model;
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['doctors'] =  $this->doctors_model->get_all_doctors();

        echo view('Admin/header');
        echo view('Admin/Doctors/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['locations'] =  $this->doctors_model->get_all_locations();


        echo view('Admin/header');
        echo view('Admin/Doctors/form' , $data);
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['doctor'] =  $this->doctors_model->get_doctor_by_id($id);
        $data['locations'] =  $this->doctors_model->get_all_locations();
        $data['selected_location'] = explode(",",$data['doctor'][0]['location_id']) ; 

        echo view('Admin/header');
        echo view('Admin/Doctors/form',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->doctors_model->delete_doctor($id);
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

            return redirect()->to(base_url('/admin/doctors'));
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


            if ($this->request->getFile('doctor_image')) 
            {
                $image = $this->request->getFile('doctor_image');
                $imageNameTrip = strrpos($_FILES['doctor_image']['name'], ".");
                $imageName = substr($_FILES['doctor_image']['name'], 0, $imageNameTrip);
                $destnpath = 'images/doctor-images/'.$imageName;
                if($_FILES['doctor_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->doctors_model->data['doctor_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->doctors_model->data['doctor_image']) 
                {
                    unset($this->doctors_model->data['doctor_image']);
                }
            }

            if ($this->request->getFile('doctor_thumb_image')) 
            {
                $image = $this->request->getFile('doctor_thumb_image');
                $imageNameTrip = strrpos($_FILES['doctor_thumb_image']['name'], ".");
                $imageName = substr($_FILES['doctor_thumb_image']['name'], 0, $imageNameTrip);
                $destnpath = 'images/doctor-images/doctor-inner-images/'.$imageName;
                if($_FILES['doctor_thumb_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image);
                }
                $this->doctors_model->data['doctor_thumb_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->doctors_model->data['doctor_thumb_image']) 
                {
                    unset($this->doctors_model->data['doctor_thumb_image']);
                }
            }

            $this->doctors_model->data['doctor_name'] = trim($this->request->getVar('doctor_name'));
            $this->doctors_model->data['meta_title'] = trim($this->request->getVar('meta_title'));
            $this->doctors_model->data['meta_description'] = trim($this->request->getVar('meta_description'));
            $this->doctors_model->data['h1_tag'] = trim($this->request->getVar('h1_tag'));
            $this->doctors_model->data['alt_text'] = trim($this->request->getVar('alt_text'));
            $this->doctors_model->data['title_text'] = trim($this->request->getVar('title_text'));
            $this->doctors_model->data['department'] = trim($this->request->getVar('department'));
            $this->doctors_model->data['canonical_tag'] = trim($this->request->getVar('canonical_tag'));
            $this->doctors_model->data['location_id'] = implode(",", $this->request->getVar('location_id'));

            if(!empty(trim($this->request->getVar('doctor_url'))))
            {
                $this->doctors_model->data['doctor_url'] = $this->request->getVar('doctor_url');

            }
            else
            {
                $this->doctors_model->data['doctor_url'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ ]/', ' ', rtrim(strtolower($this->request->getVar('doctor_name')))));;
            }
            $this->doctors_model->data['designation'] = trim($this->request->getVar('designation'));

            $this->doctors_model->data['about'] = trim($this->request->getVar('about'));
            $this->doctors_model->data['qualification'] = trim($this->request->getVar('qualification'));
            $this->doctors_model->data['work_experience'] = trim($this->request->getVar('work_experience'));
            $this->doctors_model->data['publications'] = trim($this->request->getVar('publications'));
            $this->doctors_model->data['past_positions'] = trim($this->request->getVar('past_positions'));
            $this->doctors_model->data['fellow_member_ship'] = trim($this->request->getVar('fellow_member_ship'));
            $this->doctors_model->data['awards_recognitions'] = trim($this->request->getVar('awards_recognitions'));

            $this->doctors_model->data['doc_address'] = trim($this->request->getVar('doc_address'));
            $this->doctors_model->data['priority'] = trim($this->request->getVar('priority'));
            $this->doctors_model->data['active_status'] = trim($this->request->getVar('active_status'));
            
            //Add
            if (empty($this->request->getPost('id'))) 
            {
                $this->doctors_model->data['created_date'] =date('Y-m-d H:i:s');
                $this->doctors_model->data['created_by'] = session()->get('user_id');
                $this->doctors_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->doctors_model->data['last_modified_by'] = session()->get('user_id');

                $isInsert = $this->doctors_model->insert_doctor();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Doctor Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            }  
            //Edit
            else
            {
                $id  = $this->request->getVar('id');
                $this->doctors_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->doctors_model->data['last_modified_by'] = session()->get('user_id');
                $isUpdated = $this->doctors_model->update_doctor($id );
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

            return redirect()->to(base_url('/admin/doctors'));



        }    

    }




}
?>