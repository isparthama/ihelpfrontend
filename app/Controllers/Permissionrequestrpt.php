<?php

namespace App\Controllers;

use App\Models\M_suratjalanModel;
use App\Models\M_suratjalanfacilityModel;
use App\Models\M_suratjalanitemModel;
use App\Models\M_surat_ijin_statusModel;

class Permissionrequestrpt extends BaseController {
    public $SERVER;
    var $model=null;
    var $m_suratjalanfacilitymodel=null;
    var $m_suratjalanitemmodel=null;
    var $m_surat_ijin_status=null;

    public function __construct()
    {
        $this->model=new M_suratjalanModel();
        $this->m_suratjalanfacilitymodel=new M_suratjalanfacilityModel();
        $this->m_suratjalanitemmodel=new M_suratjalanitemModel();
        $this->m_surat_ijin_status=new M_surat_ijin_statusModel();
		
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');
        $data['data']=$this->model->getall(0,0)->getResult();
        $data['m_surat_ijin_status']=$this->m_surat_ijin_status->getall()->getResult();

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

    public function printreport(){
        $data['from_date']=$this->request->getPost('from_date');
        $data['to_date']=$this->request->getPost('to_date');
        $data['status']=$this->request->getPost('status');

        
        $result=$this->model->getdata($data)->getResult();
        foreach ($result as $row){
            $row->facility=$this->m_suratjalanfacilitymodel->getbysuratjalanid($row->id)->getResult();
            $row->item=$this->m_suratjalanitemmodel->getbysuratjalanid($row->id)->getResult();
        }

        $data["data"]=$result;
        

        $options = new \Dompdf\Options();
        $options->setIsRemoteEnabled(true);
        
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('report_permisionrequest',$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Laporan Surat Ijin.pdf',array('Attachment'=>0));
    }
}