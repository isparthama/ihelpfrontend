<?php

namespace App\Models;

use CodeIgniter\Model;

class M_business_typeModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_business_type_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_business_type_get]
        $id";

        return $this->db->query($sql);
    }
}