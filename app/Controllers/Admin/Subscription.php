<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Subscription_model;

class Subscription extends Controller
{
    public $session , $subscription_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->subscription_model = new Subscription_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['subscribe'] =  $this->subscription_model->get_all_subscribe();

        echo view('Admin/header');
        echo view('Admin/Subscription/index',$data);
        echo view('Admin/footer');
    }

    public function delete($id)
    {
        if (session()->get('user_id'))
        {
            $query = $this->subscription_model->delete_subscribe($id);
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

            return redirect()->to(base_url('/admin/subscriptions'));
        } 
        else 
        {
            return redirect()->to(base_url('/admin/login'));
        }
    }
}

?>