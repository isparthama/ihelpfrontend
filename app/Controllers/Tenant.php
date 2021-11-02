<?php

namespace App\Controllers;



class Tenant extends BaseController {
    public $SERVER;
    var $monitoringmodel=null;

    public function __construct()
    {
        
		
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');
        
        echo view('menu',$data);
        echo view('maintenance');
    }
}