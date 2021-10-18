<?php

namespace App\Models;

use CodeIgniter\Model;

class M_departemenModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_departemen_getall]";
        
        return $this->db->query($sql);
    }

}