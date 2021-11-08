<?php

namespace App\Models;

use CodeIgniter\Model;

class M_tenant_statusModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_tenant_status_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_tenant_status_get]
        $id";

        return $this->db->query($sql);
    }
}