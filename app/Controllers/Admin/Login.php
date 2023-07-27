<?php 

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

use App\Models\Admin\Admin_Model;

class Login extends Controller
{

    public $login_model;
    public $session;
    

    function __construct()
    {
        helper('url');
        helper('form');

        $this->session = \Config\Services::session();
        $this->login_model = new  Admin_Model();
    }

    //For displaying login page
    public function index()
    {
        if(!$this->session->get('user_id'))
        {
            echo view('Admin/Login/index');
        }
        else
        {
            return redirect()->to(base_url('/admin/dashboard'));
        }

    }

    //Checking login information 
    public function login_check()
    {
        $admin_login_username = trim($this->request->getVar('user_name')) ;
        $admin_login_password = trim($this->request->getVar('password'));

        $isLogin = $this->login_model->login($admin_login_username,$admin_login_password);

        if(!empty($isLogin))
        {


            $sessionData = 
                [
                    'user_id' => $isLogin->user_id,
                    'role_id'  => $isLogin->role_id,
                    'username' => $isLogin->username,
                    'first_name' => $isLogin->first_name,
                    'last_name' => $isLogin->last_name,
                    'email' => $isLogin->email,
                    'status_ind' => $isLogin->status_ind,   
                    'admin_user_menu_items'=> $isLogin->admin_menu_item_id,
                ];
            $this->session->set($sessionData);
            return redirect()->to(base_url('/admin/dashboard'));
        } 
        else 
        {
            session()->setFlashdata('loginError', 'Username Or Password is Invalid');
            return redirect()->to(base_url('/admin/login'));
        }


    }

    
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/admin/login'));
    }
}

?>