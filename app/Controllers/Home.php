<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('index');
        echo view('footer');
    }
    
    public function about()
    {
        echo view('header');
        echo view('about');
        echo view('footer');
    }
    public function services()
    {
        echo view('header');
        echo view('services');
        echo view('footer');
    }
    
    public function team()
    {
        $data['css'] = '';
        echo view('header',$data);
        echo view('team');
        echo view('footer');
    }
    
    public function contact_us()
    {
        echo view('header');
        echo view('contact_us');
        echo view('footer');
    }
    
}
