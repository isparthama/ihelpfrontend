<?php

namespace App\Models;

use CodeIgniter\Model;

class M_jeniscomplainModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[M_jeniscomplain_getall]";
        
        return $this->db->query($sql);
    }

}