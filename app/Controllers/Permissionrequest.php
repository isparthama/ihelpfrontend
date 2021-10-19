<?php

namespace App\Controllers;

use App\Models\M_suratjalanModel;
use App\Models\M_tenantModel;
use App\Models\M_surat_ijinModel;
use App\Models\M_surat_ijin_detailModel;
use App\Models\M_facilityModel;
use App\Models\M_surat_jalan_progressModel;
use App\Models\M_suratjalanfacilityModel;
use Email;
class Permissionrequest extends BaseController {
    public $SERVER;
    var $model=null;
    var $tenantmodel=null;
    var $surat_ijinmodel=null;
    var $surat_ijin_detailmodel=null;
    var $facilitymodel=null;
    var $m_surat_jalan_progressmodel=null;
    var $email;

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

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        if ($this->request->getMethod()=='post') return $this->store();
        if ($this->request->getGet('id')>0) return $this->getdata();

        $data['rows']=$this->model->getall(0,0)->getResult();
        $data['user']=session()->get('userinfo');

        $units=$this->tenantmodel->getall()->getresult();
        
        if ($units[0]->status=='Gagal'){
            $units=[];
        }
        $data['units']=$units;
        
        $facility=$this->facilitymodel->getall()->getresult();
        $data['facility']=$facility;
        $stroptfacility="";
        foreach($facility as $row){
            $stroptfacility = $stroptfacility.'<option value="'.$row->id.'">'.$row->Keterangan.'</option>';
        }
        $data['stroptfacility']=$stroptfacility;
        $data['approved']=[];
        $rscategory=$this->surat_ijinmodel->getall()->getresult();
        
        $data['categories']=$rscategory;
        echo view('menu',$data);
        echo view('permissionrequest',$data);
    }

    public function getdata(){
        $result=$this->model->get($this->request->getGet('id'))->getRow();
        $result->json_facility=json_encode($this->m_suratjalanfacilitymodel->getbysuratjalanid($result->id)->getResult());
        $result->approvedby=json_encode($this->m_surat_jalan_progressmodel->get($result->id)->getResult());

        echo json_encode($result);
    }
    
    public function store(){
        $unit=$this->request->getPost('unit');
        $category=$this->request->getPost('category');
        $start_date=$this->request->getPost('start_date');
        $start_time=$this->request->getPost('start_time');
        $end_date=$this->request->getPost('end_date');
        $end_time=$this->request->getPost('end_time');
        $title=$this->request->getPost('title');
        $tenant_pic=$this->request->getPost('tenant_pic');
        $hp_pic=$this->request->getPost('hp_pic');
        $Detail_Deskripsi=$this->request->getPost('Detail_Deskripsi');

        $Nama=$this->request->getPost('Nama');
        $Kontak=$this->request->getPost('Kontak');
        $Kantor=$this->request->getPost('Kantor');
        $Alamat=$this->request->getPost('Alamat');

        
        

        
        $json_kontraktor='';
        $json_items='';
        $json_facility='';

        
        $kontraktor_arr=[
            "Nama"=>$Nama,
            "Kontak"=>$Kontak,
            "Kantor"=>$Kantor,
            "Alamat"=>$Alamat,
        ];
        
        
        $itemcode=$this->request->getPost('itemcode');
        $itemname=$this->request->getPost('itemname');
        $quantity=$this->request->getPost('quantity');
        $note=$this->request->getPost('note');


        $json_items_arr=[];
        
        for($i=0;$i<sizeof($itemcode);$i++){
            $data=[
                "itemcode"=>$itemcode[$i],
                "itemname"=>$itemname[$i],
                "quantity"=>$quantity[$i],
                "note"=>$note[$i],
            ];
            $json_items_arr[]=$data;
        }

        $idfacility=$this->request->getPost('idfacility');
        $from_date=$this->request->getPost('from_date');
        $from_time=$this->request->getPost('from_time');
        $to_date=$this->request->getPost('to_date');
        $to_time=$this->request->getPost('to_time');
        
        $json_facility_arr=[];
        for($i=0;$i<sizeof($idfacility);$i++){
            $data=[
                "idfacility"=>$idfacility[$i],
                "from_date"=>$from_date[$i],
                "from_time"=>$from_time[$i],
                "to_date"=>$to_date[$i],
                "to_time"=>$to_time[$i],
            ];
            $json_facility_arr[]=$data;
        }
        
        $from_time_multitime=$this->request->getPost('from_time_multitime');
        $to_time_multitime=$this->request->getPost('to_time_multitime');
        $location_multitime=$this->request->getPost('location_multitime');
        $json_multitime_arr=[];
        

        for($i=0;$i<sizeof($from_time_multitime);$i++){
            $data=[
                "from_time"=>$from_time_multitime[$i],
                "to_time"=>$to_time_multitime[$i],
                "location"=>$location_multitime[$i],
            ];
            $json_multitime_arr[]=$data;
        }

        $json_kontraktor=json_encode($kontraktor_arr);
        $json_items=json_encode($json_items_arr);
        $json_facility=json_encode($json_facility_arr);
        $json_multitime=json_encode($json_multitime_arr);

        $result=$this->model->store(
            $unit,
            $category,
            $start_date,
            $start_time,
            $end_date,
            $end_time,
            $title,
            $tenant_pic,
            $hp_pic,
            $Detail_Deskripsi,
            $json_kontraktor,
            $json_items,
            $json_facility,
            $json_multitime
        );

        if ($result){
            return redirect()->to(base_url('Permissionrequest'));
        } else {
            echo 'gagal';
        }
    }

    public function sendEmail(){

        $attachment='';
        $to='isparthama@gmail.com';
        $title='test send email';
        $message='<html>content email</html>';

        // // : ihelp@cowellcommercial.com pswd: Abcd_1234 stmp: mail.cowellcommercial.com port:587
        $config['protocol']    = 'smtp';
        $config['SMTPHost']    = 'mail.cowellcommercial.com';
        $config['SMTPPort']    = '587';
        $config['SMTPTimeout'] = '7';
        $config['SMTPUser']    = 'ihelp@cowellcommercial.com';
        $config['SMTPPass']    = 'Abcd_1234';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['SMTPCrypto']    = "";
        $config['mailType'] = 'html'; // or html
        $mail_config['send_multipart'] = FALSE;
        $config['validation'] = TRUE; // bool whether to validate email or not    

        $email = \Config\Services::email($config);

        // $email = \Config\Services::email();

		$email->setFrom('ihelp@cowellcommercial.com','ihelp');
		$email->setTo($to);

		// $email->attach($attachment);

		$email->setSubject($title);
		$email->setMessage($message);

        $result=$email->send();
        echo dd($email);
		if(! $result){
            echo 'email sent successfully';
			return false;
		}else{
            $email->printDebugger();
			return true;
		}
	}

    public function sendtogmail() {
        $config = array();
        $config['protocol']     = "mail"; // you can use 'mail' instead of 'sendmail or smtp'
        $config['SMTPHost']    = "ssl://smtp.googlemail.com";// you can use 'smtp.googlemail.com' or 'smtp.gmail.com' instead of 'ssl://smtp.googlemail.com'
        $config['SMTPUser']    = "isparthama.cowel@gmail.com"; // client email gmail id
        $config['SMTPPass']    = "cowel211104  "; // client password
        $config['SMTPPort']    =  465;
        $config['SMTPCrypto']  = '';
        $config['SMTPTimeout'] = "";
        $config['mailtype']     = "html";
        $config['charset']      = "iso-8859-1";
        $config['newline']      = "\r\n";
        $config['wordwrap']     = TRUE;
        $config['validate']     = FALSE;
        $this->email = \Config\Services::email($config); // intializing email library, whitch is defiend in system
    
        $this->email->setNewline("\r\n"); // comuplsory line attechment because codeIgniter interacts with the SMTP server with regards to line break
    
        $from_email = "isparthama.cowel@gmail.com"; // sender email, coming from my view page 
        $to_email ="isparthama@gmail.com"; // reciever email, coming from my view page
        //Load email library
    
        $this->email->setFrom($from_email);
        $this->email->setTo($to_email);
        $this->email->setSubject('Send Email Codeigniter'); 
        $this->email->setMessage('The email send using codeigniter library');  // we can use html tag also beacause use $config['mailtype'] = 'HTML'
        //Send mail
        if($this->email->send()){
            // $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
            echo "email_sent";
        }
        else{
            echo "email_not_sent";
            echo $this->email->printDebugger();  // If any error come, its run
        }
    }
}