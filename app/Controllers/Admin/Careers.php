<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\CareerAdmin_Model;

class Careers extends Controller
{

    public $session , $career_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->career_model = new CareerAdmin_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['careers'] =  $this->career_model->get_all_careers();

        echo view('Admin/header');
        echo view('Admin/Careers/index',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->career_model->delete_career($id);
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

            return redirect()->to(base_url('/admin/careers'));
        } 
        else 
        {
            return redirect()->to(base_url('/admin/login'));
        }
    }

}


?>