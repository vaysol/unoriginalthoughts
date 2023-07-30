<?php 

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Admin extends Controller
{

    public $admin_model , $session;


    function __construct()
    {
        helper('url');
        helper('form');
        $this->session = \Config\Services::session();

    }
    public function index()
    {
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        } else {
            return redirect()->to(base_url('/admin/dashboard'));
        }
    }
}

?>