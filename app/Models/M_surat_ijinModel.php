<?php

namespace App\Models;

use CodeIgniter\Model;

class M_surat_ijinModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_surat_ijin_getall]";
        
        return $this->db->query($sql);
    }

}