<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Enquiry_Model;

class Enquiry extends Controller
{
    public $session , $enquiry_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->enquiry_model = new Enquiry_Model();
    }

    public function index()
    {
        
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['enquiries'] =  $this->enquiry_model->get_all_enquiries();

        echo view('Admin/header');
        echo view('Admin/Enquiry/index',$data);
        echo view('Admin/footer');
       
    }

}
?>

