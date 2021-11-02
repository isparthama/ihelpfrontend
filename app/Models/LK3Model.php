<?php

namespace App\Models;

use CodeIgniter\Model;

class LK3Model extends Model
{
    public function getall($filter_status,$transaksi_typeid){
        $user=session()->get('userinfo');
        $token=$user['token'];

        $sql="exec [dbo].[LK3_getall]
        $filter_status,
        $transaksi_typeid,
        '$token'";

        return $this->db->query($sql);
    }

    public function get($id){
        $sql="exec [dbo].[LK3_get] $id";

        $result=$this->db->query($sql);

        return $result;
    }

    public function store(
        $tenantid
        ,$jeniscomplainid
        ,$transaksi_typeid
        ,$task_id
        ,$status
        ,$category
        ,$created_by
        ,$by_id
        ,$inisiator_name
        ,$date_time
        ,$assigned_by
        ,$assigned_by_as
        ,$lokasi
        ,$title
        ,$desc
        ,$media_1
        ,$media_2
        ,$media_3
        ,$token
        ,$departemenid
        ,$facilityid
       ,$buildingid
       ,$asset
       ,$quantity
       ,$location
       ,$urgent
    ){
        $user=session()->get('userinfo');
        $token=$user['token'];

        $sql="EXEC [dbo].[LK3_create] 
        '$tenantid',
        '$jeniscomplainid',
        '$transaksi_typeid',
        '$task_id',
        '$status',
        '$category',
        '$created_by',
        '$by_id',
        '$inisiator_name',
        '$date_time',
        '$assigned_by',
        '$assigned_by_as',
        '$lokasi',
        '$title',
        '$desc',
        '$media_1',
        '$media_2',
        '$media_3',
        '$token',
        '$departemenid',
        '$facilityid',
        '$buildingid',
        '$asset',
        '$quantity',
        '$location',
        '$urgent'
        ";


      return $this->db->query($sql);
    }
}