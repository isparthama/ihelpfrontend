<?php

namespace App\Controllers;

use App\Models\M_employeeModel;
use App\Models\M_positionModel;
use App\Models\M_buildingModel;
use App\Models\M_roleModel;
use App\Models\M_departemenModel;
use App\Models\M_userModel;

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
        $this->m_usermodel=new M_userModel();
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
            if ($this->runsendemail($result->id)){
                return redirect()->to(base_url('staff'));
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

        return $this->sentemail($data);
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

        if($result){
            return redirect()->to(base_url('staff'));
		}else{
            $email->printDebugger();
			return false;
		}
    }

    public function getdata(){
        $result=$this->model->get($this->request->getGet('id'))->getRow();
        echo json_encode($result);
    }
}