<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\User_Model;

class User extends Controller
{
    public $session , $user_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->user_model = new User_Model();
    }

    public function index()
    {
        
        if (empty($this->session->get('id'))) {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['users'] =  $this->user_model->get_all_users();

        echo view('Admin/header');
        echo view('Admin/User/index',$data);
        echo view('Admin/footer');
       
    }

}
?>

