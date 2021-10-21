<?php

namespace App\Controllers;

use App\Models\M_surat_jalan_progressModel;
use App\Models\M_suratjalanModel;
use App\Models\M_suratjalanfacilityModel;

class M_surat_jalan_progress extends BaseController {
    public $SERVER;
    var $model=null;
    
    public function __construct()
    {
        $this->m_suratjalanModel=new M_suratjalanModel();
        $this->model=new M_surat_jalan_progressModel();
        $this->m_suratjalanfacilitymodel=new M_suratjalanfacilityModel();
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
        
        $result_suratjalan=$this->m_suratjalanModel->get($id)->getRow();
        if ($result_suratjalan->status==2) {
            if ($this->printtofile($id)){
                $this->sendEmail($id);
            }
        }
        return json_encode($result);
    }

    public function printtofile($id){
        
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $data['user']=session()->get('userinfo');
        
        $result=$this->m_suratjalanModel->get($id)->getRow();

        $result->json_facility=json_encode($this->m_suratjalanfacilitymodel->getbysuratjalanid($result->id)->getResult());
        $result->approvedby=json_encode($this->model->get($result->id)->getResult());

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
        $output = $dompdf->output();

        $printed_filename='SURATJALAN'.$result->id.'.pdf';
        file_put_contents('generated/'.$printed_filename, $output);

        $this->m_suratjalanModel->printed_filename($id,$printed_filename);

        return true;
        
    }

    public function sendEmail($id){

        $result=$this->m_suratjalanModel->get($id)->getRow();
        
        $data['permissionrequest']=$result;
        
        
        $attachment='generated/'.$result->printed_filename;
        $to='isparthama@gmail.com';
        $title='New Permission Requested!';
        $message='<html>content email</html>';

        $result->statusid=4;
        if ($result->statusid==1){
            $message=view('email_template_permission_requested',$data);
        }
        if ($result->statusid==4){
            $title='Permission Approved!';
            $message=view('email_template_permission_approved',$data);
        }

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

		 $email->attach($attachment);

		$email->setSubject($title);
		$email->setMessage($message);

        $result=$email->send();
		if(! $result){
            echo 'email sent successfully';
			return false;
		}else{
            $email->printDebugger();
			return true;
		}
	}
}