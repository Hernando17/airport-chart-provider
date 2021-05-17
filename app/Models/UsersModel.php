<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $allowedFields = ['foto', 'level', 'username', 'email', 'password', 'slug'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
