<?php

namespace App\Controllers;

use App\Models\T_transaksiModel;

class Servicetv extends BaseController {
    public $SERVER;
    var $model=null;

    public function __construct()
    {
        
		$this->model=new T_transaksiModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');
        
        $data['transaksi']=$this->model->getall(0,1)->getResult();
        
        echo view('menu',$data);
        echo view('servicetv',$data);
    }
}