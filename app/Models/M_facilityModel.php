<?php

namespace App\Models;

use CodeIgniter\Model;

class M_facilityModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_fasilitas_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_fasilitas_get]
        $id";

        return $this->db->query($sql);
    }
}