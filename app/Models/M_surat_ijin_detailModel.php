<?php

namespace App\Models;

use CodeIgniter\Model;

class M_surat_ijin_detailModel extends Model
{
    public function getall($idtipesuratijin,$idtenant){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[M_surat_ijin_detail_getall_byidsuratijin_idtenant] $idtipesuratijin,$idtenant";
        return $this->db->query($sql);
    }

}