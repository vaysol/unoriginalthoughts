<?php


namespace App\Controllers\Admin;

use App\Models\Admin\ResearchPapers_Model;
use CodeIgniter\Controller;

class ResearchPapers extends Controller
{
    
    public $session , $research_papers_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->research_papers_model = new ResearchPapers_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['research_papers'] =  $this->research_papers_model->get_all_research_papers();

        echo view('Admin/header');
        echo view('Admin/Research-Papers/index',$data);
        echo view('Admin/footer');
    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/Research-Papers/form');
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['research_paper'] =  $this->research_papers_model->get_research_paper_by_id($id);

        echo view('Admin/header');
        echo view('Admin/Research-Papers/form',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->research_papers_model->delete_research_paper($id);
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

            return redirect()->to(base_url('/admin/research-papers'));
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
                $destnpath = 'images/research-papers-images/'.$imageName;
                if($_FILES['banner_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->research_papers_model->data['banner_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->research_papers_model->data['banner_image']) 
                {
                    unset($this->research_papers_model->data['banner_image']);
                }
            }

            if ($this->request->getFile('research_image')) 
            {
                $image = $this->request->getFile('research_image');
                $imageNameTrip = strrpos($_FILES['research_image']['name'], ".");
                $imageName = substr($_FILES['research_image']['name'], 0, $imageNameTrip);
                $destnpath = 'images/research-papers-images/research-papers-inner-images/'.$imageName;
                if($_FILES['research_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->research_papers_model->data['research_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->research_papers_model->data['research_image']) 
                {
                    unset($this->research_papers_model->data['research_image']);
                }
            }


            $this->research_papers_model->data['title'] = $this->request->getVar('title');
            $this->research_papers_model->data['alt_text'] = $this->request->getVar('alt_text');
            $this->research_papers_model->data['title_text'] = $this->request->getVar('title_text');
            $this->research_papers_model->data['alt_text1'] = $this->request->getVar('alt_text1');
            $this->research_papers_model->data['title_text1'] = $this->request->getVar('title_text1');
            $this->research_papers_model->data['published_date'] = $this->request->getVar('published_date');
            $this->research_papers_model->data['details'] = $this->request->getVar('details');
            $this->research_papers_model->data['meta_title'] = $this->request->getVar('meta_title');
            $this->research_papers_model->data['meta_description'] = $this->request->getVar('meta_description');
            $this->research_papers_model->data['meta_keywords'] = $this->request->getVar('meta_keywords');
            $this->research_papers_model->data['other_meta_tags'] = $this->request->getVar('other_meta_tags');
            $this->research_papers_model->data['canonical_tag'] = $this->request->getVar('canonical_tag');
            $this->research_papers_model->data['status_ind'] = $this->request->getVar('status_ind');
            if($this->request->getVar('slug'))
            {
                $this->research_papers_model->data['slug'] = $this->request->getVar('slug');

            }
            else
            {
                $this->research_papers_model->data['slug'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ ]/', ' ', rtrim(strtolower($this->request->getVar('title')))));;
            }

            //Add
            if (empty($this->request->getPost('research_id'))) 
            {
                $this->research_papers_model->data['created_date'] =date('Y-m-d H:i:s');
                $this->research_papers_model->data['created_by'] = session()->get('user_id');
                $this->research_papers_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->research_papers_model->data['last_modified_by'] = session()->get('user_id');

                $isInsert = $this->research_papers_model->insert_research_paper();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Research Paper Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            }  
              // Edit
              else
              {
                  $research_id  = $this->request->getVar('research_id');
                  $this->research_papers_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                  $this->research_papers_model->data['last_modified_by'] = session()->get('user_id');
                  $isUpdated = $this->research_papers_model->update_research_papers($research_id);
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

            return redirect()->to(base_url('/admin/research-papers'));



        }
    }
}
 ?>

