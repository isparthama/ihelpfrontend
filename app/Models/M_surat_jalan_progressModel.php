<?php

namespace App\Models;

use CodeIgniter\Model;

class M_surat_jalan_progressModel extends Model
{
    public function create($idsuratjalan,$statusid){
        $user=session()->get('userinfo');

        $sql="exec [m_surat_jalan_progress_create]
        $idsuratjalan,
        $statusid,
        ".$user['id'].",
        '',
        '".$user['token']."'";

        return $this->db->query($sql);
    }

    public function get($idsuratjalan){
        $sql="[dbo].[m_suratjalan_progress_getbysuratjalanid]
        $idsuratjalan";

        return $this->db->query($sql);
    }
}