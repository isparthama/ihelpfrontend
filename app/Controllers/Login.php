<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController {
    public $SERVER;
    var $loginmodel=null;

    public function __construct()
    {
        $this->loginmodel=new LoginModel();
		
    }

    public function index(){
        if ($this->request->getMethod()=='post') return $this->dologin();
        
        if (session()->get('userinfo')){
            session()->destroy();
        }
        echo view('login');

    }

    public function dologin(){
        $email=$this->request->getPost('email');
        $password=$this->request->getPost('password');

        $data=$this->loginmodel->getbyemail($email,$password)->getRowArray();
        if ($data){
            $pass = $data['password'];
            
            $verify_pass = $password==$pass;
            if($verify_pass){
                $ses_data = $data;
                session()->set('userinfo',$ses_data);
                return redirect()->to(base_url('dashboard'));
            }else{
                session()->setFlashdata('msg', 'Password Salah');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('msg', 'Email Belum Terdaftar');
            $this->request->setMethod('get');
            $this->index();
        }
    }
}