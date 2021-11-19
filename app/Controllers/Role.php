<?php

namespace App\Controllers;

use App\Models\M_roleModel;

class Role extends BaseController {
    public $SERVER;
    
    var $model=null;

    public function __construct()
    {
        $this->model=new M_roleModel();
		
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        if ($this->request->getMethod()=='post') return $this->store();
        if ($this->request->getMethod()=='delete') return $this->delete();
        if ($this->request->getGet('id')>0) return $this->getdata();

        $data['user']=session()->get('userinfo');
        $data['data']=$this->model->getall()->getResult();

        echo view('menu',$data);
        echo view('role');
    }

    public function store(){
        $id=$this->request->getPost('id');
        $todo=$this->request->getPost('todo');

        $role_name=$this->request->getPost('role_name');
        $keterangan=$this->request->getPost('keterangan');
    
        
        $result=$this->model->store(
            $id,
            $todo,
            $role_name,
            $keterangan
        );
            
            if ($result){
                return redirect()->to(base_url('role'));
            } else {
                echo 'gagal';
            }
    }

    public function getdata(){
        $result=$this->model->get($this->request->getGet('id'))->getRow();
        echo json_encode($result);
    }
}