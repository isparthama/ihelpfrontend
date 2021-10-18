<?php

namespace App\Controllers;

use App\Models\M_service_status_reasonModel;

class M_service_status_reason extends BaseController {
    public $SERVER;
    var $model=null;
    
    public function __construct()
    {
        $this->model=new M_service_status_reasonModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));
        if ($this->request->getMethod()=='get') return $this->getall();

        return false;
    }

    public function getall(){
        $idservicestatus=$this->request->getVar('status');
        

        $result=$this->model->getall($idservicestatus)->getResult();
        
        return json_encode($result);
    }
}