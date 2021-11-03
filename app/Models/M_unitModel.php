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
        $sql="[dbo].[m_unit_get]
        $id";

        return $this->db->query($sql);
    }

    public function store(
        $Keterangan,
        $buildingid,
        $unit_code,
        $businessgroupid,
        $buisnesstypeid,
        $floor,
        $line,
        $detail
        ) {
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

        return $this->db->query($sql);
        }
}