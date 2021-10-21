<?php

namespace App\Models;

use CodeIgniter\Model;

class M_suratjalanModel extends Model
{
    public function getall($idtipesuratjalan,$statusid){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_suratjalan_getall]
        $idtipesuratjalan,
        $statusid,
        '".$user['token']."'
        ";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_suratjalan_get] '".$user['token']."',$id";
        
        $result=$this->db->query($sql);

        return $result;
    }

    public function printed_filename($id,$printed_filename){
        $sql="exec [dbo].[m_suratjalan_setprinted_filename] $id,'$printed_filename'";

        $result=$this->db->query($sql);

        return $result;
    }
    public function store(
        $tenantid,
        $idtipesuratjalan,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $Judul,
        $tenant_pic,
        $hp_pic,
        $Detail_Deskripsi,
        $json_kontraktor,
        $json_items,
        $json_facility,
        $json_multitime
    ) {
        $user=session()->get('userinfo');

        $Tenant=$tenantid;
        $Kontak=$tenant_pic;
        $Mulai=$start_date;
        $Selesai=$end_date;

        $sql="exec [dbo].[m_suratjalan_create]
        '',
        '$idtipesuratjalan',
        '',
        '$tenantid',
        '$Tenant',
        '$Kontak',
        '$Judul',
        '$Mulai',
        '$Selesai',
        '$tenant_pic',
        '$hp_pic',
        '$Detail_Deskripsi',
        '$json_kontraktor',
        '$json_items',
        '$json_facility',
        '$json_multitime',
        '".$user['token']."'
        ";
        
        $result=$this->db->query($sql)->getRow();

        
        if ($result){
            if ($json_kontraktor!=''){
                $item=json_decode($json_kontraktor,true);

                $sql="exec m_suratjalankontraktor_create 
                    '".$result->id."',
                    '".$item['Nama']."',
                    '".$item['Kontak']."',
                    '".$item['Kantor']."',
                    '".$item['Alamat']."'
                ";
                
                $this->db->query($sql);
            
            }
            
            if ($json_items!=''){
                foreach (json_decode($json_items,true) as $item){
                    $sql="exec m_suratjalanitems_create 
                        '".$result->id."',
                        '".$item['itemcode']."',
                        '".$item['itemname']."',
                        '".$item['quantity']."',
                        '".$item['note']."'
                    ";
                    
                    $this->db->query($sql);
                }
            }

            if ($json_facility!=''){
                foreach (json_decode($json_facility,true) as $item){
                    $sql="exec m_suratjalanfacility_create 
                        '".$result->id."',
                        '".$item['idfacility']."',
                        '".$item['from_date']."',
                        '".$item['from_time']."',
                        '".$item['to_date']."',
                        '".$item['to_time']."'
                    ";

                    $this->db->query($sql);
                }
            }

            if ($json_multitime!=''){
                foreach (json_decode($json_multitime,true) as $item){
                    $sql="exec m_suratjalanmultitime_create 
                        '".$result->id."',
                        '".$item['from_time']."',
                        '".$item['to_time']."',
                        '".$item['location']."'
                    ";
                    echo $sql;
                    $this->db->query($sql);
                }
            }
        }

        return $result;
    }
}