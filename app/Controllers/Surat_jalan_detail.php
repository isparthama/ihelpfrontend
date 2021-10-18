<?php

namespace App\Controllers;

use App\Models\M_surat_ijin_detailModel;

class Surat_jalan_detail extends BaseController {
    public $SERVER;
    var $model=null;
    
    public function __construct()
    {
        $this->model=new M_surat_ijin_detailModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));
        if ($this->request->getMethod()=='get') return $this->getall();

        return false;
    }

    public function getall(){
        $idtenant=$this->request->getVar('idtenant');
        $idcategori=$this->request->getVar('idcategory');

        $result=$this->model->getall($idcategori,$idtenant)->getRow();
        
        return json_encode($result);
    }
}