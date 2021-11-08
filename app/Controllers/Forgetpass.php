<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Forgetpass extends BaseController {
    public $SERVER;
    var $loginmodel=null;

    public function __construct()
    {
        $this->loginmodel=new LoginModel();
		
    }

    public function index(){
        if ($this->request->getMethod()=='post') return $this->forgetpassword();
        
        if (session()->get('userinfo')){
            session()->destroy();
        }
        echo view('forgetpass');

    }

    public function forgetpassword(){
        $email=$this->request->getPost('email');
        $password=$this->request->getPost('password');

        $result=$this->loginmodel->forgetpassword($email)->getRow();
        if ($result){
            $data['data']=$result;
            $this->sendEmail($data);
            echo view('forgetpass_success');
        } else {
            session()->setFlashdata('msg', 'Email Belum Terdaftar');
            $this->request->setMethod('get');
            $this->index();
        }
    }

    public function sendEmail($data){

        
        $attachment='';
        $to=$data->email;
        $title='Forget Password';
        $message='<html>content email</html>';

        
        $message=view('email_template_forgetpasssword',$data);
        
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
        if(! $result){
            echo 'email sent successfully';
			return false;
		}else{
            $email->printDebugger();
			return true;
		}
	}
}