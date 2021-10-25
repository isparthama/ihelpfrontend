<?php

namespace App\Models;

use CodeIgniter\Model;

class M_commentModel extends Model
{
    public function getall($id){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[t_transaksi_comment_byid] $id";
        
        return $this->db->query($sql);
    }

    public function store($comment,$id){
        $user=session()->get('userinfo');
        $userid=$user['id'];

        $sql="exec [dbo].[m_comment_create] '$comment',$id,$userid";
        
        return $this->db->query($sql);
    }
}