<?php

namespace App\Models;

use CodeIgniter\Model;

class T_transaksi_progressModel extends Model
{
    public function create($transaksi_id,$status_id,$kategori_id,$departemen_id,$alasanid){
        $user=session()->get('userinfo');
        $token=$user['token'];
        $userid=$user['id'];
        $idservice_status_reason=$alasanid;
        $catatan='';

        if ($departemen_id==null) $departemen_id=0;
        if ($kategori_id==null) $kategori_id=0;
        if ($catatan=null) $catatan='';
        if ($alasanid==null) $idservice_status_reason=0;
        
        $sql="exec [dbo].[t_transaksi_progress_create]
        $departemen_id,
        $kategori_id,
        $transaksi_id,
        $status_id,
        $idservice_status_reason,
        $userid,
        '$catatan',
        '$token'";

        return $this->db->query($sql);
    }

    public function get($transaksi_id){
        $sql="[dbo].[t_transaksi_progress_gettransaksi_id]
        $transaksi_id";

        return $this->db->query($sql);
    }

    
}