<?php

namespace App\Controllers;

use App\Models\T_transaksiModel;

class UploadController extends BaseController {
    public $SERVER;
    var $model=null;

    public function __construct()
    {
        
		$this->model=new T_transaksiModel();
    }

    public function index(){
        if(! session()->get('userinfo')) return redirect()->to(base_url('Login'));

        $id=$this->request->getVar('id');
        $mediaid=$this->request->getVar('mediaid');
        $file_path="";

        helper('filesystem');

        $result=$this->model->get($this->request->getGet('id'))->getRow();
        
        if ($mediaid==1){
            $file_path=$result->media_1;
        }
        if ($mediaid==2){
            $file_path=$result->media_2;
        }
        if ($mediaid==3){
            $file_path=$result->media_3;
        }

        // Image was not found
        $image_content = file_get_contents('uploads/'.$file_path);

        if($image_content === FALSE)
        {
            show_error('Image "'.$file_path.'" could not be found.');
            return FALSE;
        }

        $mime_type_or_return = 'image/jpg';
        // Return the image or output it?
        if($mime_type_or_return === TRUE)
        {
            return $image_content;
        }

        header('Content-Length: '.strlen($image_content)); // sends filesize header
        header('Content-Type: '.$mime_type_or_return); // send mime-type header
        header('Content-Disposition: inline; filename="'.basename($file_path).'";'); // sends filename header
        exit($image_content); // reads and outputs the file onto the output buffer
    }
}