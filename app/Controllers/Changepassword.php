<?php

namespace App\Controllers;

use App\Models\LoginModel;


class Changepassword extends BaseController {
    public $SERVER;
    var $loginmodel=null;

    public function __construct()
    {
        $this->loginmodel=new LoginModel();
		
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');

        if ($this->request->getMethod()=='post') return $this->dochangepassword();
        
        echo view('menu',$data);
        echo view('changepassword');
    }

    public function dochangepassword(){
        $current_pass=$this->request->getPost('current_pass');
        $new_pass=$this->request->getPost('new_pass');
        $retype_pass=$this->request->getPost('retype_pass');

        $user=session()->get('userinfo');

        if ($current_pass!=$user['password']){
            session()->setFlashdata('msg', 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Password Lama Tidak Sesuai</div>');
        } else if($new_pass!=$retype_pass) {
            session()->setFlashdata('msg', 
            '    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Password Baru Tidak Sama dengan Rtype Password</div>');
        } else if ($this->loginmodel->updatepassword($new_pass)){
            session()->setFlashdata('msg', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Perubahan Password Berhasil</div>');
        }

        $data['user']=$user;
        echo view('menu',$data);
        echo view('changepassword',$data);
    }
}