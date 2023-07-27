<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\ContactUsAdmin_Model;



class ContactUs extends Controller
{

    public $session , $contact_us;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->contact_us = new ContactUsAdmin_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['contact_us'] =  $this->contact_us->get_all_contact_us();

        echo view('Admin/header');
        echo view('Admin/Contact-Us/index',$data);
        echo view('Admin/footer');
    }


    public function delete($id)
    {

        if (session()->get('user_id'))
        {
            $query = $this->contact_us->delete_contact_us($id);
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

            return redirect()->to(base_url('/admin/contact-us'));
        } 
        else 
        {
            return redirect()->to(base_url('/admin/login'));
        }
    }

    function print_the_record_by_id($id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['print_contact_us'] =  $this->contact_us->get_contact_us_by_id($id);

        echo view('Admin/header');
        echo view('Admin/Contact-Us/print',$data);
        echo view('Admin/footer');
    }

   


}
 ?>