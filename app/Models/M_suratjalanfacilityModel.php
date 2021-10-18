<?php

namespace App\Models;

use CodeIgniter\Model;

class M_suratjalanfacilityModel extends Model
{
    public function getbysuratjalanid($suratjalanid){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_suratjalanfacility_getbysuratjalanid] $suratjalanid";
        
        return $this->db->query($sql);
    }

}