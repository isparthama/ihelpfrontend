<?php

namespace App\Models;

use CodeIgniter\Model;

class M_tenant_employeeModel extends Model
{
    public function getall(){
        $user=session()->get('userinfo');

        $sql="exec [dbo].[m_tenant_employee_getall]
        ";
        
        return $this->db->query($sql);
    }

    public function get($id){
        $sql="[dbo].[m_tenant_employee_get]
        $id";

        return $this->db->query($sql);
    }

    public function store(
        $id,
        $todo,
        $unitid,
        $Email,
        $PIC_Name,
        $PITenant_Status,
        $role_id,
        $Cell_Number,
        $homephone,
        $workphone,
        $CIPIC,
        $CECell_Number,
        $CEHome_Number,
        $CEWork_Number
        ) {
            if ($id>0){
                if ($todo=="delete"){
                    $sql="[dbo].[m_tenant_employee_delete]
                    '$id'
                    ";
                } else {
                    $sql="[dbo].[m_tenant_employee_update]
                    '$id',
                    '$unitid',
                    '$Email',
                    '$PIC_Name',
                    '$PITenant_Status',
                    '$role_id',
                    '$Cell_Number',
                    '$homephone',
                    '$workphone',
                    '$CIPIC',
                    '$CECell_Number',
                    '$CEHome_Number',
                    '$CEWork_Number'
                    ";
                    }
            } else {
                $sql="[dbo].[m_tenant_employee_create]
                '$unitid',
                '$Email',
                '$PIC_Name',
                '$PITenant_Status',
                '$role_id',
                '$Cell_Number',
                '$homephone',
                '$workphone',
                '$CIPIC',
                '$CECell_Number',
                '$CEHome_Number',
                '$CEWork_Number'           
                ";
            }

       try {
            return $this->db->query($sql);
       } catch (Exception  $e){
            return false;
       }
    }
}