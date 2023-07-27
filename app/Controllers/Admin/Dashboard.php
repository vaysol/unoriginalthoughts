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
        if(!$this->session->get('user_id'))
        {
            echo view('Admin/Login/index');
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