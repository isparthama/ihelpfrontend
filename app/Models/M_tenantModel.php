<?php

namespace App\Models;

use CodeIgniter\Model;

class M_tenantModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_tenant_getall]
        '".$user['token']."'
        ";
        
        return $this->db->query($sql);
    }

}