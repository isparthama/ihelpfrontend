<?php

namespace App\Controllers;

use App\Models\M_unitModel;
use App\Models\M_buildingModel;
use App\Models\M_business_groupModel;

class Unit extends BaseController {
    public $SERVER;
    var $monitoringmodel=null;
    var $business_groupmodel=null;

    public function __construct()
    {
        $this->model=new M_unitModel();
		$this->m_buildingModel=new M_buildingModel();
        $this->m_business_groupmodel=new M_business_groupModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');
        $data['unit']=$this->model->getall()->getResult();
        $data['m_building']=$this->m_buildingModel->getall()->getResult();
        // $data['m_business_group']=$this->m_business_groupModel->getall()->getResult();
        
        echo view('menu',$data);
        echo view('maintenance');
    }
}