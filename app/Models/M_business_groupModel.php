<?php

namespace App\Models;

use CodeIgniter\Model;

class M_business_groupModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_business_group_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_business_group_get]
        $id";

        return $this->db->query($sql);
    }
}