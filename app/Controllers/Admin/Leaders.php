<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Leader_Model;

class Leaders extends Controller
{
    public $session , $leader_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->leader_model = new Leader_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['leaders'] =  $this->leader_model->get_all_leaders_for_admin();

        echo view('Admin/header');
        echo view('Admin/Leaders/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/Leaders/form');
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['leader'] =  $this->leader_model->get_leader_by_id_for_admin($id);

        echo view('Admin/header');
        echo view('Admin/Leaders/form',$data);
        echo view('Admin/footer');
    }


    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->leader_model->delete_leaders($id);
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

            return redirect()->to(base_url('/admin/leaders'));
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

            if ($this->request->getFile('photo')) 
            {
                $image = $this->request->getFile('photo');
                $imageNameTrip = strrpos($_FILES['photo']['name'], ".");
                $imageName = substr($_FILES['photo']['name'], 0, $imageNameTrip);
                $destnpath = 'images/leader-images/'.$imageName;
                if($_FILES['photo']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->leader_model->data['photo'] = $imageName != NULL ? $destnpath : '';
                if (!$this->leader_model->data['photo']) 
                {
                    unset($this->leader_model->data['photo']);
                }
            }

            $this->leader_model->data['title'] = trim($this->request->getVar('title'));
            $this->leader_model->data['designation'] = trim($this->request->getVar('designation'));
            $this->leader_model->data['display_order'] = trim($this->request->getVar('display_order'));
            $this->leader_model->data['description'] = trim($this->request->getVar('description'));
            $this->leader_model->data['alt_text'] = trim($this->request->getVar('alt_text'));
            $this->leader_model->data['title_text'] = trim($this->request->getVar('title_text'));
            $this->leader_model->data['meta_title'] = trim($this->request->getVar('meta_title'));
            $this->leader_model->data['meta_description'] = trim($this->request->getVar('meta_description'));
            $this->leader_model->data['meta_keywords'] = trim($this->request->getVar('meta_keywords'));
            $this->leader_model->data['other_meta_tags'] = trim($this->request->getVar('other_meta_tags'));
            $this->leader_model->data['canonical_tag'] = trim($this->request->getVar('canonical_tag'));
            $this->leader_model->data['qualification'] = trim($this->request->getVar('qualification'));
            $this->leader_model->data['status_ind'] = trim($this->request->getVar('status_ind'));
            if($this->request->getVar('slug'))
            {
                $this->leader_model->data['slug'] = trim($this->request->getVar('slug'));

            }
            else
            {
                $this->leader_model->data['slug'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ ]/', ' ', rtrim(strtolower($this->request->getVar('title')))));;
            }

            //Add
            if (empty($this->request->getPost('leader_id'))) 
            {
                $this->leader_model->data['created_date'] =date('Y-m-d H:i:s');
                $this->leader_model->data['created_by'] = session()->get('user_id');
                $this->leader_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->leader_model->data['last_modified_by'] = session()->get('user_id');

                $isInsert = $this->leader_model->insert_into_leaders();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Leader Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            } 
            // Edit
            else
            {
                $leader_id  = $this->request->getVar('leader_id');
                $this->leader_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->leader_model->data['last_modified_by'] = session()->get('user_id');
                $isUpdated = $this->leader_model->update_leaders($leader_id );
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

            return redirect()->to(base_url('/admin/leaders'));
        }
    }
}
?>