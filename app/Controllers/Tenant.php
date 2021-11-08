<?php

namespace App\Controllers;

use App\Models\M_tenant_employeeModel;
use App\Models\M_unitModel;
use App\Models\M_buildingModel;
use App\Models\M_business_groupModel;
use App\Models\M_business_typeModel;
use App\Models\M_tenant_statusModel;
use App\Models\M_role_statusModel;

class Tenant extends BaseController {
    public $SERVER;
    var $monitoringmodel=null;
    var $m_business_groupModel=null;
    var $m_business_typeModel=null;
    var $m_unit_codeModel=null;
    var $m_tenant_statusModel=null;
    var $m_role_statusModel=null;

    public function __construct()
    {
        $this->model=new M_tenant_employeeModel();
        $this->m_unit_codeModel=new M_unitModel();
		$this->m_buildingModel=new M_buildingModel();
        $this->m_business_groupModel=new M_business_groupModel();
        $this->m_business_typeModel=new M_business_typeModel();
        $this->m_tenant_statusModel=new M_tenant_statusModel();
        $this->m_role_statusModel=new M_role_statusModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        if ($this->request->getMethod()=='post') return $this->store();
        if ($this->request->getMethod()=='delete') return $this->delete();
        if ($this->request->getGet('id')>0) return $this->getdata();

        $data['user']=session()->get('userinfo');
        $data['tenant']=$this->model->getall()->getResult();
        $data['m_unit_code']=$this->m_unit_codeModel->getall()->getResult();
        $data['m_tenant_status']=$this->m_tenant_statusModel->getall()->getResult();
        $data['m_role_status']=$this->m_role_statusModel->getall()->getResult();
        

        $data['m_building']=$this->m_buildingModel->getall()->getResult();
        $data['m_business_group']=$this->m_business_groupModel->getall()->getResult();
        $data['m_business_type']=$this->m_business_typeModel->getall()->getResult();
        
        echo view('menu',$data);
        echo view('tenant',$data);
    }

    public function store(){

        $id=$this->request->getPost('id');
        $todo=$this->request->getPost('todo');

        $unitid=$this->request->getPost('PIunit_code_id');
        $Email=$this->request->getPost('PIemail');
        $PIC_Name=$this->request->getPost('PIname');
        $PITenant_Status=$this->request->getPost('PITenant_Status');
        $role_id=$this->request->getPost('PIrole_user');
        $Cell_Number=$this->request->getPost('CICell_Number');
        $homephone=$this->request->getPost('CIHome_Number');
        $workphone=$this->request->getPost('CIWork_Number');
        $CIPIC=$this->request->getPost('CIPIC');
        $CECell_Number=$this->request->getPost('CECell_Number');
        $CEHome_Number=$this->request->getPost('CEHome_Number');
        $CEWork_Number=$this->request->getPost('CEWork_Number');



        $result=$this->model->store(
        $id,
        $todo,
        $unitid,
        $Email,
        $PIC_Name,
        $PITenant_Status,
        $role_id,
        $Cell_Number,
        $homephone,
        $workphone,
        $CIPIC,
        $CECell_Number,
        $CEHome_Number,
        $CEWork_Number
        );
        
        if ($result){
            return redirect()->to(base_url('tenant'));
        } else {
            echo 'gagal';
        }
    }

    public function getdata(){
        $result=$this->model->get($this->request->getGet('id'))->getRow();
        
        

        
        echo json_encode($result);
    }
}