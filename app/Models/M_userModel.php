<?php

namespace App\Models;

use CodeIgniter\Model;

class M_userModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_user_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_user_get]
        $id";

        return $this->db->query($sql);
    }

    public function getbyemail($email){
        $sql="[dbo].[m_user_getbyemail]
        '$email'";

       return $this->db->query($sql);
    }
}