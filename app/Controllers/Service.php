<?php

namespace App\Controllers;

use App\Models\T_transaksiModel;
use App\Models\M_tenantModel;
use App\Models\M_service_statusModel;
use App\Models\M_jeniscomplainModel;
use App\Models\M_categoryModel;
use App\Models\M_departemenModel;
use App\Models\M_service_status_reasonModel;
use App\Models\T_transaksi_progressModel;

class Service extends BaseController {
    public $SERVER;
    var $model=null;
    var $tenantmodel=null;
    var $m_service_statusmodel=null;
    var $m_jeniscomplainmodel=null;
    var $m_categorymodel=null;
    var $m_departemenModel=null;
    var $m_service_status_reasonmodel=null;
    var $t_transaksi_progressModel=null;

    public function __construct()
    {
        $this->model=new T_transaksiModel();
        $this->tenantmodel=new M_tenantModel();
        $this->m_service_statusmodel=new M_service_statusmodel();
		$this->m_jeniscomplainmodel=new M_jeniscomplainModel();
        $this->m_categorymodel=new M_categoryModel();
        $this->m_departemenModel=new M_departemenModel();
        $this->m_service_status_reasonmodel=new M_service_status_reasonModel();
        $this->t_transaksi_progressModel=new T_transaksi_progressModel();
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

        echo view('menu',$data);
        echo view('service',$data);
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
       ,$token);

       if ($result){
            return redirect()->to(base_url('service'));
        } else {
            echo 'gagal';
        }
    }

    public function getdata(){
        $result=$this->model->get($this->request->getGet('id'))->getRow();
        
        $result->progress=$this->t_transaksi_progressModel->get($result->id)->getResult();
        echo json_encode($result);
    }
}