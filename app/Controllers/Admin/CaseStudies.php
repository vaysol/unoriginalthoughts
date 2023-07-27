<?php

namespace App\Controllers\Admin;

use App\Models\Admin\CaseStudies_Model;
use CodeIgniter\Controller;

class CaseStudies extends Controller
{
    public $session , $case_study_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->case_study_model = new CaseStudies_Model;
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['case_studies'] =  $this->case_study_model->get_all_case_studies();

        echo view('Admin/header');
        echo view('Admin/Case-Studies/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/Case-Studies/form');
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['case_study'] =  $this->case_study_model->get_case_study_by_id($id);

        echo view('Admin/header');
        echo view('Admin/Case-Studies/form',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->case_study_model->delete_case_study($id);
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

            return redirect()->to(base_url('/admin/case-studies'));
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
                $destnpath = 'images/case-study-images/'.$imageName;
                if($_FILES['banner_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->case_study_model->data['banner_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->case_study_model->data['banner_image']) 
                {
                    unset($this->case_study_model->data['banner_image']);
                }
            }

            if ($this->request->getFile('case_studies_image')) 
            {
                $image = $this->request->getFile('case_studies_image');
                $imageNameTrip = strrpos($_FILES['case_studies_image']['name'], ".");
                $imageName = substr($_FILES['case_studies_image']['name'], 0, $imageNameTrip);
                $destnpath = 'images/case-study-images/case-study-inner-images/'.$imageName;
                if($_FILES['case_studies_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->case_study_model->data['case_studies_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->case_study_model->data['case_studies_image']) 
                {
                    unset($this->case_study_model->data['case_studies_image']);
                }
            }
            $this->case_study_model->data['title'] = $this->request->getVar('title');
            $this->case_study_model->data['alt_text'] = $this->request->getVar('alt_text');
            $this->case_study_model->data['title_text'] = $this->request->getVar('title_text');
            $this->case_study_model->data['alt_text1'] = $this->request->getVar('alt_text1');
            $this->case_study_model->data['title_text1'] = $this->request->getVar('title_text1');
            $this->case_study_model->data['published_date'] = $this->request->getVar('published_date');
            $this->case_study_model->data['details'] = $this->request->getVar('details');
            $this->case_study_model->data['meta_title'] = $this->request->getVar('meta_title');
            $this->case_study_model->data['meta_description'] = $this->request->getVar('meta_description');
            $this->case_study_model->data['meta_keywords'] = $this->request->getVar('meta_keywords');
            $this->case_study_model->data['other_meta_tags'] = $this->request->getVar('other_meta_tags');
            $this->case_study_model->data['canonical_tag'] = $this->request->getVar('canonical_tag');
            $this->case_study_model->data['status_ind'] = $this->request->getVar('status_ind');
            if($this->request->getVar('slug'))
            {
                $this->case_study_model->data['slug'] = $this->request->getVar('slug');

            }
            else
            {
                $this->case_study_model->data['slug'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ ]/', ' ', rtrim(strtolower($this->request->getVar('title')))));;
            }

            //Add
            if (empty($this->request->getPost('case_studies_id'))) 
            {
                $this->case_study_model->data['created_date'] =date('Y-m-d H:i:s');
                $this->case_study_model->data['created_by'] = session()->get('user_id');
                $this->case_study_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->case_study_model->data['last_modified_by'] = session()->get('user_id');

                $isInsert = $this->case_study_model->insert_case_study();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Case Study Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            }  
            //Edit
            else
            {
                $case_studies_id  = $this->request->getVar('case_studies_id');
                $this->case_study_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->case_study_model->data['last_modified_by'] = session()->get('user_id');
                $isUpdated = $this->case_study_model->update_case_study($case_studies_id );
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
            return redirect()->to(base_url('/admin/case-studies'));
        }
    }
}

?>