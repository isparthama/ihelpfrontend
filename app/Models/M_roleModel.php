<?php

namespace App\Models;

use CodeIgniter\Model;

class M_roleModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_role_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_role_get]
        $id";

        return $this->db->query($sql);
    }
}