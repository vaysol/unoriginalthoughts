<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\NewsAndEvents_Model;

class NewsAndEvents extends Controller
{
    public $session , $news_and_events_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->news_and_events_model = new NewsAndEvents_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['news_and_events'] = $this->news_and_events_model->get_all_news_and_events();

        echo view('Admin/header');
        echo view('Admin/News-and-Events/index',$data);
        echo view('Admin/footer');


    }

    public function add()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        echo view('Admin/header');
        echo view('Admin/News-and-Events/form');
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['news_and_event'] =  $this->news_and_events_model->get_news_and_event_by_id($id);

        echo view('Admin/header');
        echo view('Admin/News-and-Events/form',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->news_and_events_model->delete_news_and_event($id);
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

            return redirect()->to(base_url('/admin/news-events'));
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
                $destnpath = 'images/news-and-events-images/'.$imageName;
                if($_FILES['banner_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->news_and_events_model->data['banner_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->news_and_events_model->data['banner_image']) 
                {
                    unset($this->news_and_events_model->data['banner_image']);
                }
            }

            
            if ($this->request->getFile('inner_image')) 
            {
                $image = $this->request->getFile('inner_image');
                $imageNameTrip = strrpos($_FILES['inner_image']['name'], ".");
                $imageName = substr($_FILES['inner_image']['name'], 0, $imageNameTrip);
                $destnpath = 'images/news-and-events-images/news-and-events-inner-images/'.$imageName;
                if($_FILES['inner_image']['name'])
                {
                    webp_image_with_transperent($destnpath,$image );
                }
                $this->news_and_events_model->data['inner_image'] = $imageName != NULL ? $destnpath : '';
                if (!$this->news_and_events_model->data['inner_image']) 
                {
                    unset($this->news_and_events_model->data['inner_image']);
                }
            }

            $this->news_and_events_model->data['title'] = $this->request->getVar('title');
            $this->news_and_events_model->data['meta_title'] = $this->request->getVar('meta_title');
            $this->news_and_events_model->data['meta_description'] = $this->request->getVar('meta_description');
            $this->news_and_events_model->data['meta_keywords'] = $this->request->getVar('meta_keywords');
            $this->news_and_events_model->data['media_type'] = $this->request->getVar('media_type');
            $this->news_and_events_model->data['alt_text'] = $this->request->getVar('alt_text');
            $this->news_and_events_model->data['title_text'] = $this->request->getVar('title_text');
            $this->news_and_events_model->data['published_date'] = $this->request->getVar('published_date');
            $this->news_and_events_model->data['publication'] = $this->request->getVar('publication');
            $this->news_and_events_model->data['year'] = $this->request->getVar('year');
            $this->news_and_events_model->data['details'] = $this->request->getVar('details');
            $this->news_and_events_model->data['active_status'] = $this->request->getVar('active_status');
            if($this->request->getVar('slug'))
            {
                $this->news_and_events_model->data['slug'] = $this->request->getVar('slug');

            }
            else
            {
                $this->news_and_events_model->data['slug'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ ]/', ' ', rtrim(strtolower($this->request->getVar('title')))));;
            }

            //Add
            if (empty($this->request->getPost('release_id'))) 
            {
                $this->news_and_events_model->data['created_date'] =date('Y-m-d H:i:s');
                $this->news_and_events_model->data['created_by'] = session()->get('user_id');
                $this->news_and_events_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->news_and_events_model->data['last_modified_by'] = session()->get('user_id');

                $isInsert = $this->news_and_events_model->insert_news_and_event();
                if ($isInsert) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'News And Event Added Successfully');
                    session()->setFlashdata('msg', $msg);
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Add.');
                    session()->setFlashdata('msg', $msg);
                }
            }   
            // Edit
            else
            {
                $release_id  = $this->request->getVar('release_id');
                $this->news_and_events_model->data['last_modified_date'] = date('Y-m-d H:i:s');
                $this->news_and_events_model->data['last_modified_by'] = session()->get('user_id');
                $isUpdated = $this->news_and_events_model->update_news_and_event($release_id);
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


            
            return redirect()->to(base_url('/admin/news-events'));



        }
    }
}
?>