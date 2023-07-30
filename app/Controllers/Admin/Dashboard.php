<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public $session;
    function __construct()
    {
        helper('url');
        helper('form');

        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if(!$this->session->get('id'))
        {
            return redirect()->to(base_url('/admin/login'));
        }
        else
        {
            echo view('Admin/header');
            echo view('Admin/dashboard');
            echo view('Admin/footer');
        }
    }

 

}

?>