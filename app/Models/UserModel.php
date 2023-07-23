<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['usrname', 'password', 'role'];

    public function getUserByCredentials($username, $password)
    {
        return $this->where('username', $username)
            ->where('password', $password)
            ->first();
    }

    public function current_user()
    {
        if (!$this->session->has('id_user')) {
            return false;
        } else {
            return true;
        }
    }
}
