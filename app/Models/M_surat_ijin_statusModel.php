<?php

namespace App\Models;

use CodeIgniter\Model;

class M_surat_ijin_statusModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_surat_ijin_status_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_surat_ijin_status_get]
        $id";

        return $this->db->query($sql);
    }
}