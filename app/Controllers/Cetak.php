<?php

namespace App\Controllers;

use App\Models\M_suratjalanModel;
use App\Models\M_tenantModel;
use App\Models\M_surat_ijinModel;
use App\Models\M_surat_ijin_detailModel;
use App\Models\M_facilityModel;
use App\Models\M_surat_jalan_progressModel;
use App\Models\M_suratjalanfacilityModel;

class Cetak extends BaseController {
    public $SERVER;
    var $model=null;
    var $tenantmodel=null;
    var $surat_ijinmodel=null;
    var $surat_ijin_detailmodel=null;
    var $facilitymodel=null;
    var $m_surat_jalan_progressmodel=null;

    public function __construct()
    {
        $this->model=new M_suratjalanModel();
        $this->tenantmodel=new M_tenantModel();
		$this->surat_ijinmodel=new M_surat_ijinModel();
        $this->surat_ijin_detailmodel=new M_surat_ijin_detailModel();
        $this->facilitymodel=new M_facilityModel();
        $this->m_surat_jalan_progressmodel=new M_surat_jalan_progressModel();
        $this->m_suratjalanfacilitymodel=new M_suratjalanfacilityModel();
    }


    public function permissionrequest($id){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');
        
        $result=$this->model->get($id)->getRow();
        $result->json_facility=json_encode($this->m_suratjalanfacilitymodel->getbysuratjalanid($result->id)->getResult());
        $result->approvedby=json_encode($this->m_surat_jalan_progressmodel->get($result->id)->getResult());

        $json_facilities=json_decode($result->json_facility);
        foreach ($json_facilities as $row){
            $facility=$this->facilitymodel->get($row->idfacility)->getRow();
            $row->ketfacility=$facility->Keterangan;
        }
        $result->json_facility=json_encode($json_facilities);

        $data['suratjalan']=$result;
        
        // echo view('formpermissionrequest',$data);

        $options = new \Dompdf\Options();
        $options->setIsRemoteEnabled(true);
        
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('formpermissionrequest',$data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Surat Ijin.pdf',array('Attachment'=>0));
        
    }

    public function viewemail(){
        echo view('email_template');
    }
}