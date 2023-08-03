<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Orders_Model;

class Orders extends Controller
{
    public $session , $orders_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->orders_model = new Orders_Model();
    }

    public function index()
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['orders'] =  $this->orders_model->get_all_orders();

        echo view('Admin/header');
        echo view('Admin/Orders/index',$data);
        echo view('Admin/footer');
    }


}    