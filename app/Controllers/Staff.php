<?php

namespace App\Controllers;

use App\Models\M_employeeModel;
use App\Models\M_positionModel;
use App\Models\M_buildingModel;
use App\Models\M_roleModel;
use App\Models\M_departemenModel;

class Staff extends BaseController {
    public $SERVER;
    var $model=null;
    var $m_positionmodel=null;
    var $m_buildingmodel=null;
    var $m_rolemodel=null;
    var $m_departmenmodel=null;

    public function __construct()
    {
        $this->model=new M_employeeModel();
        $this->m_positionmodel=new M_positionModel();
		$this->m_buildingModel=new M_buildingModel();
        $this->m_roleModel=new M_roleModel();
        $this->m_departmenmodel=new M_departemenModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        if ($this->request->getMethod()=='post') return $this->store();
        if ($this->request->getMethod()=='delete') return $this->delete();
        if ($this->request->getGet('id')>0) return $this->getdata();
        $data['user']=session()->get('userinfo');
        
        $data['datas']=$this->model->getall()->getResult();
        $data['positions']=$this->m_positionmodel->getall()->getResult();
        $data['building']=$this->m_buildingModel->getall()->getResult();
        $data['roles']=$this->m_roleModel->getall()->getResult();
        $data['departemens']=$this->m_departmenmodel->getall()->getResult();

        echo view('menu',$data);
        echo view('staff');
    }

    public function store(){
        $id=$this->request->getPost('id');
        $todo=$this->request->getPost('todo');

        $Name=$this->request->getPost('name');
        $Email=$this->request->getPost('email');
        $Cell_Number=$this->request->getPost('cellnumber');
        $workphone=$this->request->getPost('worknumber');
        $positionid=$this->request->getPost('position');
        $departmentid=$this->request->getPost('notification');
        $roleid=$this->request->getPost('roleuser');
        $superiorid=$this->request->getPost('superior');
        $buildingid=$this->request->getPost('building');


        $result=$this->model->store(
        $id,
        $todo,
        $Name,
        $Email,
        $Cell_Number,
        $workphone,
        $positionid,
        $departmentid,
        $roleid,
        $superiorid,
        $buildingid
        );
        
        if ($result){
            return redirect()->to(base_url('staff'));
        } else {
            echo 'gagal';
        }
    }

    public function getdata(){
        $result=$this->model->get($this->request->getGet('id'))->getRow();
        
        

        
        echo json_encode($result);
    }
}