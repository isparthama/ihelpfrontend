<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function getbyemail ($email,$password){
        return $this->db->query("exec [m_user_login] 
        '$email',
        '$password',
        ''");
    }

    public function forgetpassword($email){
        return $this->db->query("exec [m_user_forgotpassword] 
        '$email'
        ");
    }

    public function updatepassword($newpass){
        $user=session()->get('userinfo');

        $userid=$user['id'];

        return $this->db->query("exec [m_user_updatepassword] 
        '$userid',
        '$newpass'
        ");
    }

}