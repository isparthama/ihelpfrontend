<?php

namespace App\Controllers;

use App\Models\T_transaksiModel;
use App\Models\M_service_statusModel;
use App\Models\M_business_groupModel;
use App\Models\M_commentModel;

class Servicerpt extends BaseController {
    public $SERVER;
    var $model=null;
    var $m_service_status=null;
    var $m_business_group=null;
    var $t_transaksi_progressModel=null;

    public function __construct()
    {
        $this->model=new T_transaksiModel();
        $this->m_service_status=new M_service_statusModel();
        $this->m_business_group=new M_business_groupModel();
        $this->m_commentModel=new M_commentModel();
		
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');
        $result=$this->model->getall(0,0)->getResult();
        $data['data']=$result;
        $data['m_service_status']=$this->m_service_status->getall()->getResult();
        $data['m_business_group']=$this->m_business_group->getall()->getResult();

        echo view('menu',$data);
        echo view('servicerpt',$data);
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

        $jenis_laporan=$this->request->getPost('jenis_laporan');

        $m_business_group=$this->m_business_group->get($jenis_laporan)->getRow();
        $data['jenis_laporan']=$m_business_group->Keterangan;
        
        $result=$this->model->getdata($data)->getResult();

        foreach ($result as $row){
            $result_comments=$this->m_commentModel->getall($row->No)->getResult();
            foreach ($result_comments as $row_comment){
                $row->ProgressLaporanDetail+= "Progress By:".$row->nama_lengkap."Progress Detail".$row_comment->Keterangan."Progress Date".$row_comment->created_at.";";
            }
        }

        $data["data"]=$result;
        

        $options = new \Dompdf\Options();
        $options->setIsRemoteEnabled(true);
        
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('report_service',$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Laporan Tenant Complain.pdf',array('Attachment'=>0));
    }
}