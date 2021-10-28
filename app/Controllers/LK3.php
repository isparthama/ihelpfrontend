<?php

namespace App\Controllers;



class Lk3 extends BaseController {
    public $SERVER;
    var $monitoringmodel=null;

    public function __construct()
    {
        
		
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');
        
        echo view('menu',$data);
        echo "<center><strong>Maaf menu ini masih dalam pengembangan</strong></center>";
        echo "<p><center><image src='assets/images/maintenance.jpg'></center>";
        
    }
}