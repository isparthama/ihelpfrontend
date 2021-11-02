<?php

namespace App\Controllers;

use App\Models\LK3_progressModel;

class LK3_progress extends BaseController {
    public $SERVER;
    var $model=null;
    
    public function __construct()
    {
        $this->model=new LK3_progressModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));
        if ($this->request->getMethod()=='post') return $this->create();

        return false;
    }

    public function create(){
        $idsuratjalan=$this->request->getVar('id');
        $status=$this->request->getVar('status');
        $category=$this->request->getVar('category');
        $departemen=$this->request->getVar('departemen');
        $alasan=$this->request->getVar('alasan');

        $result=$this->model->create($idsuratjalan,$status,$category,$departemen,$alasan)->getRow();
        
        return json_encode($result);
    }
}