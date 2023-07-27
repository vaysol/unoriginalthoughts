<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\PartnerWithUs_Model;

class PartnerWithUs extends Controller
{
    public $session , $partner_with_us_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->partner_with_us_model = new PartnerWithUs_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['partner_with_us'] =  $this->partner_with_us_model->get_all_partner_with_us();

        echo view('Admin/header');
        echo view('Admin/Partner-With-Us/index',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->partner_with_us_model->delete_partner_with_us($id);
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

            return redirect()->to(base_url('/admin/partner-with-us'));
        } 
        else 
        {
            return redirect()->to(base_url('/admin/login'));
        }
    }
}
?>