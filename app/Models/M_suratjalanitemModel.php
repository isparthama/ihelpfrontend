<?php

namespace App\Models;

use CodeIgniter\Model;

class M_suratjalanitemModel extends Model
{
    public function getbysuratjalanid($suratjalanid){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_suratjalanitem_getbysuratjalanid] $suratjalanid";
        
        return $this->db->query($sql);
    }

}