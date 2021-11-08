<?php

namespace App\Models;

use CodeIgniter\Model;

class M_unitModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_unit_code_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_unit_code_get]
        $id";

        return $this->db->query($sql);
    }

    public function store(
        $id,
        $todo,
        $Keterangan,
        $buildingid,
        $unit_code,
        $businessgroupid,
        $buisnesstypeid,
        $floor,
        $line,
        $detail
        ) {
            if ($id>0){
                if ($todo=="delete"){
                    $sql="[dbo].[m_unit_code_delete]
                    '$id'
                    ";
                } else {
                    $sql="[dbo].[m_unit_code_update]
                    '$id',
                    '$Keterangan',
                    '$buildingid',
                    '$unit_code',
                    '$businessgroupid',
                    '$buisnesstypeid',
                    '$floor',
                    '$line',
                    '$detail' 
                    ";
                    }
            } else {
            $sql="[dbo].[m_unit_code_create]
            '$Keterangan',
            '$buildingid',
            '$unit_code',
            '$businessgroupid',
            '$buisnesstypeid',
            '$floor',
            '$line',
            '$detail'            
            ";
            }

       try {
            $this->db->query($sql);
            return true;
       } catch (Exception  $e){
            return false;
       }
    }
}