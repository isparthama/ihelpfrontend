<?php

namespace App\Controllers;

use App\Models\M_comment_lk3Model;

class M_comment_lk3 extends BaseController {
    public $SERVER;
    var $monitoringmodel=null;

    public function __construct()
    {
        $this->model=new M_comment_lk3Model();
		
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        if ($this->request->getMethod()=='post') return $this->store();

        $data['user']=session()->get('userinfo');
        
        echo view('menu',$data);
        
    }

    public function store(){
        $id=$this->request->getPost('id');
        $comment=$this->request->getPost('comment');

        $result=$this->model->store($comment,$id)->getRow();

        echo json_encode($result);
    }

}
