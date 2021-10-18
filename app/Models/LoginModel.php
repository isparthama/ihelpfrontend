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

}