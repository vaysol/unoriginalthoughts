<?php


namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\HomeMatrixAdmin_Model;

class  HomeMatrix extends Controller
{

    
    public $session , $home_matrix_model;

    function __construct()
    {
        helper('custom');
        $this->session = \Config\Services::session();
        $this->home_matrix_model = new HomeMatrixAdmin_Model();
    }

    public function index()
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['home_matrix'] =  $this->home_matrix_model->get_all_home_matrix();

        echo view('Admin/header');
        echo view('Admin/Home-Matrix/index',$data);
        echo view('Admin/footer');
    }

    public function edit($id)
    {
        if (empty($this->session->get('user_id'))) 
        {
            return redirect()->to(base_url('/admin/login'));
        }
        $data['single_home_matrix'] =  $this->home_matrix_model->get_home_matrix_by_id($id);

        echo view('Admin/header');
        echo view('Admin/Home-Matrix/form',$data);
        echo view('Admin/footer');
    }

    public function save()
    {

        if ($this->request->getMethod() == 'post') 
        {

            if (empty($this->session->get('user_id'))) 
            {
                return redirect()->to(base_url('/admin/login'));
            }

            $this->home_matrix_model->data['years'] = $this->request->getVar('years');
            $this->home_matrix_model->data['investigations_per_year'] = $this->request->getVar('investigations_per_year');
            $this->home_matrix_model->data['countries'] = $this->request->getVar('countries');
            $this->home_matrix_model->data['units'] = $this->request->getVar('units');
            $this->home_matrix_model->data['reporting_accuracy'] = $this->request->getVar('reporting_accuracy');
            $this->home_matrix_model->data['radiologist'] = $this->request->getVar('radiologist');
            $this->home_matrix_model->data['sla_compliance'] = $this->request->getVar('sla_compliance');

            $id  = $this->request->getVar('id');
            $isUpdated = $this->home_matrix_model->update_home_matrix($id );
            if ($isUpdated) 
            {
                $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Updated Successfully');
                session()->setFlashdata('msg', $msg);
            } else 
            {
                $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable To Update.');
                session()->setFlashdata('msg', $msg);
            }

            return redirect()->to(base_url('/admin/home-matrixes'));
        }
    }


}

?>