<?php

namespace App\Controllers;

use App\Models\M_tenant_employeeModel;
use App\Models\M_unitModel;
use App\Models\M_buildingModel;
use App\Models\M_business_groupModel;
use App\Models\M_business_typeModel;
use App\Models\M_tenant_statusModel;
use App\Models\M_role_statusModel;
use App\Models\M_userModel;

class Tenant extends BaseController {
    public $SERVER;
    var $monitoringmodel=null;
    var $m_business_groupModel=null;
    var $m_business_typeModel=null;
    var $m_unit_codeModel=null;
    var $m_tenant_statusModel=null;
    var $m_role_statusModel=null;
    var $m_usermodel=null;

    public function __construct()
    {
        $this->model=new M_tenant_employeeModel();
        $this->m_unit_codeModel=new M_unitModel();
		$this->m_buildingModel=new M_buildingModel();
        $this->m_business_groupModel=new M_business_groupModel();
        $this->m_business_typeModel=new M_business_typeModel();
        $this->m_tenant_statusModel=new M_tenant_statusModel();
        $this->m_role_statusModel=new M_role_statusModel();
        $this->m_usermodel=new M_userModel();
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
            if ($this->runsendemail($result->id)){
                return redirect()->to(base_url('tenant'));
            } else {
                echo 'Fail to send email';
            }
        } else {
            echo 'gagal';
        }
    }

    function runsendemail($id){
        $result=$this->model->get($id)->getRow();
        
        $resultuser=$this->m_usermodel->getbyemail($result->Email)->getRow();

        $data['to']=$resultuser->email;
        $data['data']=$resultuser;
        $data['title']='Informasi Akun iHelp';
        $data['message']=view('email_template_mail_password',$data);

        $this->sentemail($data);
    }
    function sentemail($data){
        $attachment='';
        $to=$data['to'];
        $title=$data['title'];
        $message=$data['message'];

        
        $message=view('email_template_mail_password',$data);
        
        // // : ihelp@cowellcommercial.com pswd: Abcd_1234 stmp: mail.cowellcommercial.com port:587
        $config['protocol']    = 'smtp';
        $config['SMTPHost']    = 'mail.cowellcommercial.com';
        $config['SMTPPort']    = '587';
        $config['SMTPTimeout'] = '7';
        $config['SMTPUser']    = 'ihelp@cowellcommercial.com';
        $config['SMTPPass']    = 'Abcd_1234';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['SMTPCrypto']    = "";
        $config['mailType'] = 'html'; // or html
        $mail_config['send_multipart'] = FALSE;
        $config['validation'] = TRUE; // bool whether to validate email or not    

        $email = \Config\Services::email($config);

        // $email = \Config\Services::email();

		$email->setFrom('ihelp@cowellcommercial.com','ihelp');
		$email->setTo($to);

		// $email->attach($attachment);

		$email->setSubject($title);
		$email->setMessage($message);

        $result=$email->send();

        if(!$result){
            echo 'email sent successfully';
			return false;
		}else{
            $email->printDebugger();
			return true;
		}
    }
    public function getdata(){
        $result=$this->model->get($this->request->getGet('id'))->getRow();
        echo json_encode($result);
    }
}