<?php

namespace App\Controllers;

use App\Models\M_surat_jalan_progressModel;

class M_surat_jalan_progress extends BaseController {
    public $SERVER;
    var $model=null;
    
    public function __construct()
    {
        $this->model=new M_surat_jalan_progressModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));
        if ($this->request->getMethod()=='post') return $this->create();

        return false;
    }

    public function create(){
        $idsuratjalan=$this->request->getVar('id');
        $statusid=$this->request->getVar('status');

        $result=$this->model->create($idsuratjalan,$statusid)->getRow();
        
        return json_encode($result);
    }
}