<?php

namespace App\Models;

use CodeIgniter\Model;

class M_role_service_statusModel extends Model
{
    public function getall($transaksid){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_role_service_status_ishasacess] 
        '".$user['token']."',
        $transaksid";
        
        return $this->db->query($sql);
    }

}