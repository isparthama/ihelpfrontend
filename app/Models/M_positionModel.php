<?php

namespace App\Models;

use CodeIgniter\Model;

class M_positionModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_position_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_position_get]
        $id";

        return $this->db->query($sql);
    }
}