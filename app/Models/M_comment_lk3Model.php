<?php

namespace App\Models;

use CodeIgniter\Model;

class M_comment_lk3Model extends Model
{
    public function getall($id){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[lk3_comment_byid] $id";
        
        return $this->db->query($sql);
    }

    public function store($comment,$id){
        $user=session()->get('userinfo');
        $userid=$user['id'];

        $sql="exec [dbo].[m_comment_lk3_create] '$comment',$id,$userid";
        
        return $this->db->query($sql);
    }
}