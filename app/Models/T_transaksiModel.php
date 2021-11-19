<?php

namespace App\Models;

use CodeIgniter\Model;

class T_transaksiModel extends Model
{
    public function getall($filter_status,$transaksi_typeid){
        $user=session()->get('userinfo');
        $token=$user['token'];

        $sql="exec [dbo].[t_transaksi_getall]
        $filter_status,
        $transaksi_typeid,
        '$token'";

        return $this->db->query($sql);
    }

    public function get($id){
        $sql="exec [dbo].[t_transaksi_get] $id";

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
        
    ){
        $user=session()->get('userinfo');
        $token=$user['token'];

        $sql="EXEC [dbo].[t_transaksi_create] 
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
        '$token'
        ";


      return $this->db->query($sql);
    }

    public function getdata($data){
        $sql="exec t_transaksi_report 
            '".$data['from_date']."',
            '".$data['to_date']."',
            '".$data['jenis_laporan']."',
            '".$data['status']."'
        ";
        
        return $this->db->query($sql);
    }
}