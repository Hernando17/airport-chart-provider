<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table      = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = ['level', 'foto', 'username', 'email', 'password', 'slug'];

    public function getDashboard($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        // $builder = $this->table('buku');
        // $builder->like('ebook', $keyword);
        // return $builder;

        return $this->table('user')->like('username', $keyword)->orLike('level', $keyword)->orLike('email', $keyword)->orLike('id', $keyword);
    }
}
