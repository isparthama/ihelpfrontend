<?php

namespace App\Models;

use CodeIgniter\Model;

class M_service_statusModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_service_status_getall]";
        
        return $this->db->query($sql);
    }

}