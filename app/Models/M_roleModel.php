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

    public function store(
        $id,
        $todo,
        $role_name,
        $keterangan
        ) {
            if ($id>0){
                if ($todo=="delete"){
                    $sql="[dbo].[m_role_delete]
                    '$id'
                    ";
                } else {
                    $sql="[dbo].[m_role_update]
                    '$id',
                    '$role_name',
                    '$keterangan'
                    ";
                    }
            } else {
                $sql="[dbo].[m_role_create]
                '$role_name',
                '$keterangan'           
                ";
            }

            try {
               
                    return true;
            } catch (Exception  $e){
                    return false;
            }
        
    }
}