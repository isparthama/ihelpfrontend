<?php

namespace App\Controllers;

use App\Models\M_suratjalanModel;

class Permissionrequestrpt extends BaseController {
    public $SERVER;
    var $model=null;

    public function __construct()
    {
        $this->model=new M_suratjalanModel();
		
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');
        $data['data']=$this->model->getall(0,0)->getResult();

        echo view('menu',$data);
        echo view('permissionrequestrpt',$data);
    }

    public function requestdata(){
        

        $from_date = $this->request->getPost('from_date');
        $to_date = $this->request->getPost('idsemesta');
		$status = $this->request->getPost('NIK');
		
        $draw = $this->request->getPost('draw');
        $length = $this->request->getPost('length');
        $start = $this->request->getPost('start');
        $tab = $this->request->getPost('tab');
        $search = $this->request->getPost('search')["value"];
        if (empty($search))
            $search = null;
        if ($length > 100)
            $length = 100;
        $output['draw'] = $draw;
        
        $result_total =$this->model->getreportdata(0,$search, $start, $length,
			$from_date,
			$to_date,
			$status
        )[0];

        $output['recordsFiltered']=$result_total['rows'];
        $output['recordsTotal']=$result_total['rows'];
        
        $output['data'] =$this->model->getreportdata(1,$search, $start, $length,
            $from_date,
            $to_date,
            $status
        );
        
            
        
        if ($output['recordsTotal'] > 0) {
            echo json_encode($output);
        } else {
            echo json_encode(array(
                "draw"                 => $draw,
                "recordsTotal"        => 0,
                "recordsFiltered"     => 0,
                "data"                 => []
            ));
        }

    }
}