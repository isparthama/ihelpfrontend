<?php

namespace App\Controllers;

use App\Models\M_unitModel;
use App\Models\M_buildingModel;
use App\Models\M_business_groupModel;
use App\Models\M_business_typeModel;

class Unit extends BaseController {
    public $SERVER;
    var $monitoringmodel=null;
    var $m_business_groupModel=null;
    var $m_business_typeModel=null;

    public function __construct()
    {
        $this->model=new M_unitModel();
		$this->m_buildingModel=new M_buildingModel();
        $this->m_business_groupModel=new M_business_groupModel();
        $this->m_business_typeModel=new M_business_typeModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        if ($this->request->getMethod()=='post') return $this->store();
        if ($this->request->getGet('id')>0) return $this->getdata();

        $data['user']=session()->get('userinfo');
        $data['unit']=$this->model->getall()->getResult();
        $data['m_building']=$this->m_buildingModel->getall()->getResult();
        $data['m_business_group']=$this->m_business_groupModel->getall()->getResult();
        $data['m_business_type']=$this->m_business_typeModel->getall()->getResult();
        
        echo view('menu',$data);
        echo view('unit');
    }

    public function store(){
        $Keterangan=$this->request->getPost('keterangan');
        $buildingid=$this->request->getPost('building');
        $unit_code=$this->request->getPost('unit_code');
        $businessgroupid=$this->request->getPost('businessgroupid');
        $buisnesstypeid=$this->request->getPost('buisnesstypeid');
        $floor=$this->request->getPost('floor');
        $line=$this->request->getPost('line');
        $detail=$this->request->getPost('detail');


        $result=$this->model->store(
        $Keterangan,
        $buildingid,
        $unit_code,
        $businessgroupid,
        $buisnesstypeid,
        $floor,
        $line,
        $detail
        )->getRow();
        
        if ($result){
            return redirect()->to(base_url('unit'));
        } else {
            echo 'gagal';
        }
    }

    public function getdata(){

    }
}