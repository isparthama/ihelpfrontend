<?php

namespace App\Controllers;

use App\Models\Servicelk3tvModel;

class Servicelk3tv extends BaseController {
    public $SERVER;
    var $model=null;

    public function __construct()
    {
        
		$this->model=new Servicelk3tvModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');
        
        $data['transaksi']=$this->model->getall(0,1)->getResult();
        
        echo view('menu',$data);
        echo view('servicetv',$data);
    }
}