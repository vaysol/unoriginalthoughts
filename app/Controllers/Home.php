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

    public function contact()
    {
        $data['css'] = '';
        echo view('header',$data);
        echo view('contact_us');
        echo view('footer');
    }
    
    public function shipping_policy()
    {
        echo view('header');
        echo view('shipping_policy');
        echo view('footer');
    }
      
    public function privacy_policy()
    {
        echo view('header');
        echo view('privacy_policy');
        echo view('footer');
    }
      
    public function return_policy()
    {
        echo view('header');
        echo view('return_policy');
        echo view('footer');
    }

    public function faqs()
    {
        echo view('header');
        echo view('faqs');
        echo view('footer');
    }
    
    public function products()
    {
        echo view('header');
        echo view('products');
        echo view('footer');
    }
    
    public function portfolio()
    {
        echo view('header');
        echo view('portfolio');
        echo view('footer');
    }
      
    public function product_inner()
    {
        echo view('header');
        echo view('product_inner');
        echo view('footer');
    }
}
