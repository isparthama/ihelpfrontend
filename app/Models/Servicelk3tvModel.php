<?php

namespace App\Models;

use CodeIgniter\Model;

class Servicelk3tvModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[servicelk3tv]";
        
        return $this->db->query($sql);
    }

}