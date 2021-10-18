<?php

namespace App\Models;

use CodeIgniter\Model;

class M_categoryModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_kategori_getall]";
        
        return $this->db->query($sql);
    }

}