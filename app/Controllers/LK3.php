<?php

namespace App\Controllers;

use App\Models\LK3Model;
use App\Models\M_tenantModel;
use App\Models\M_service_statusModel;
use App\Models\M_jeniscomplainModel;
use App\Models\M_categoryModel;
use App\Models\M_departemenModel;
use App\Models\M_service_status_reasonModel;
use App\Models\LK3_progressModel;
use App\Models\M_role_service_statusModel;
use App\Models\M_comment_lk3Model;
use App\Models\M_facilityModel;
use App\Models\M_buildingModel;

class LK3 extends BaseController {
    public $SERVER;
    var $model=null;
    var $tenantmodel=null;
    var $m_service_statusmodel=null;
    var $m_jeniscomplainmodel=null;
    var $m_categorymodel=null;
    var $m_departemenModel=null;
    var $m_service_status_reasonmodel=null;
    var $LK3_progressModel=null;
    var $m_role_service_statusModel=null;
    var $m_commentModel=null;

    public function __construct()
    {
        $this->model=new LK3Model();
        $this->tenantmodel=new M_tenantModel();
        $this->m_service_statusmodel=new M_service_statusmodel();
		$this->m_jeniscomplainmodel=new M_jeniscomplainModel();
        $this->m_categorymodel=new M_categoryModel();
        $this->m_departemenModel=new M_departemenModel();
        $this->m_service_status_reasonmodel=new M_service_status_reasonModel();
        $this->LK3_progressModel=new LK3_progressModel();
        $this->m_role_service_statusModel=new M_role_service_statusModel();
        $this->m_commentModel=new M_comment_lk3Model();
        $this->m_facilityModel=new M_facilityModel();
        $this->m_buildingModel=new M_buildingModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        if ($this->request->getMethod()=='post') return $this->store();
        if ($this->request->getGet('id')>0) return $this->getdata();

        $data['user']=session()->get('userinfo');
        $data['transaksi']=$this->model->getall(0,1)->getResult();

        
        $units=$this->tenantmodel->getall()->getresult();
        
        if ($units[0]->status=='Gagal'){
            $units=[];
        }
        $data['units']=$units;
        
        $data['service_status']=$this->m_service_statusmodel->getall()->getResult();
        $data['jeniscomplain']=$this->m_jeniscomplainmodel->getall()->getResult();
        $data['m_category']=$this->m_categorymodel->getall()->getResult();
        $data['m_departemen']=$this->m_departemenModel->getall()->getResult();
        $data['m_facility']=$this->m_facilityModel->getall()->getResult();
        $data['m_building']=$this->m_buildingModel->getall()->getResult();

        echo view('menu',$data);
        echo view('LK3',$data);
    }

    public function store(){
        $files = $this->request->getFiles();
        
        $media_1="";
        $media_2="";
        $media_3="";
        

        if($files){

            $img=$files['image1'] ;
            if ($img->isValid()) {
                $media_1=$img->getRandomName();
                $img->move(ROOTPATH . 'public/uploads', $media_1);
            }

            $img=$files['image2'] ;
            if ($img->isValid()) {
                $media_2=$img->getRandomName();
                // $img->getName()
                $img->move(ROOTPATH . 'public/uploads', $media_2);
            }

            $img=$files['image3'] ;
            if ($img->isValid()) {
                $media_3=$img->getRandomName();
                // $img->getName()
                $img->move(ROOTPATH . 'public/uploads', $media_3);
            }
        }
        $tenantid=$this->request->getPost('unit');
        $jeniscomplainid=$this->request->getPost('category');
        $transaksi_typeid=1;
        $task_id='';//$this->request->getPost('task_id');
        $status='';//$this->request->getPost('status');
        $category='';//$this->request->getPost('category');
        $created_by='';//$this->request->getPost('created_by');
        $by_id='';//$this->request->getPost('by_id');
        $inisiator_name='';//$this->request->getPost('inisiator_name');
        $date_time='';//$this->request->getPost('date_time');
        $assigned_by='';//$this->request->getPost('assigned_by');
        $assigned_by_as='';//$this->request->getPost('assigned_by_as');
        $lokasi='';//$this->request->getPost('lokasi');
        $title=$this->request->getPost('title');
        $desc=$this->request->getPost('note');
        $token='';
        $departemenid=$this->request->getPost('departemen');
        $facilityid=$this->request->getPost('facility');
        $buildingid=$this->request->getPost('building');
        $asset=$this->request->getPost('asset');
        $quantity=$this->request->getPost('quantity');
        $location=$this->request->getPost('location');
        $urgent=$this->request->getPost('urgent');

        $result=$this->model->store(
        $tenantid,
        $jeniscomplainid,
        $transaksi_typeid
       ,$task_id
       ,$status
       ,$category
       ,$created_by
       ,$by_id
       ,$inisiator_name
       ,$date_time
       ,$assigned_by
       ,$assigned_by_as
       ,$lokasi
       ,$title
       ,$desc
       ,$media_1
       ,$media_2
       ,$media_3
       ,$token
       ,$departemenid
       ,$facilityid
       ,$buildingid
       ,$asset
       ,$quantity
       ,$location
       ,$urgent);

       if ($result){
            return redirect()->to(base_url('LK3'));
        } else {
            echo 'gagal';
        }
    }

    public function getdata(){
        $result=$this->model->get($this->request->getGet('id'))->getRow();
        
        $result->progress=$this->LK3_progressModel->get($result->id)->getResult();

        $result->comments=$this->m_commentModel->getall($result->id)->getResult();

        $result_m_role_service_status=$this->m_role_service_statusModel->getall($result->id)->getRow();
        if ($result_m_role_service_status->jmlakses){
            $result->hasaccess=true;
        } else {
            $result->hasaccess=false;
        }

        
        echo json_encode($result);
    }
}