<?php

namespace App\Models;

use CodeIgniter\Model;

class M_service_status_reasonModel extends Model
{
    public function getall($idservicestatus){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_service_status_reason_getall] $idservicestatus";
        
        return $this->db->query($sql);
    }

}