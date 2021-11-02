<?php

namespace App\Models;

use CodeIgniter\Model;

class M_buildingModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_building_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_building_get]
        $id";

        return $this->db->query($sql);
    }
}