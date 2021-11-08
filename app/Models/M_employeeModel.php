<?php

namespace App\Models;

use CodeIgniter\Model;

class M_employeeModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_employee_getall]";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $token=session()->get("userinfo")['token'];

        $sql="[dbo].[m_employee_get]
        $id,
        '$token'";

        return $this->db->query($sql);
    }

    public function store(
        $id,
        $todo,
        $Name,
        $Email,
        $Cell_Number,
        $workphone,
        $positionid,
        $departmentid,
        $roleid,
        $superiorid,
        $buildingid

        ) {

            $token=session()->get("userinfo")['token'];
            if ($id>0){
                if ($todo=="delete"){
                    $sql="[dbo].[m_employee_delete]
                    '$id',
                    '$token'
                    ";
                } else {
                    $sql="[dbo].[m_employee_update]
                    '$id',
                    '$Name',
                    '$Email',
                    '$Cell_Number',
                    '$workphone',
                    '$positionid',
                    '$departmentid',
                    '$roleid',
                    '$superiorid',
                    '$buildingid',
                    '$token'
                    ";
                    }
            } else {
            $sql="[dbo].[m_employee_create]
            '$Name',
            '$Email',
            '$Cell_Number',
            '$workphone',
            '$positionid',
            '$departmentid',
            '$roleid',
            '$superiorid',
            '$buildingid',
            '$token'
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