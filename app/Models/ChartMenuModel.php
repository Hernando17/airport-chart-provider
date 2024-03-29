<?php

namespace App\Models;

use CodeIgniter\Model;

class ChartMenuModel extends Model
{
    protected $table      = 'chart';
    protected $useTimestamps = true;
    protected $allowedFields = ['icao', 'bandara', 'foto', 'keterangan', 'file'];

    public function getChartMenu()
    {
        return $this->findAll();
    }

    public function search($keyword)
    {
        // $builder = $this->table('buku');
        // $builder->like('ebook', $keyword);
        // return $builder;

        return $this->table('chart')->like('bandara', $keyword)->orLike('keterangan', $keyword)->orLike('icao', $keyword);
    }
}
