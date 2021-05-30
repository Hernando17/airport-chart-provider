<?php

namespace App\Models;

use CodeIgniter\Model;

class ChartModel extends Model
{
    protected $table      = 'chart';
    protected $useTimestamps = true;
    protected $allowedFields = ['icao', 'bandara', 'file', 'keterangan', 'slug', 'foto'];

    public function getChart($slug = false)
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

        return $this->table('chart')->like('icao', $keyword)->orLike('bandara', $keyword);
    }
}
