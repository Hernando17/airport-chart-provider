<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ChartModel;
use App\Models\ChartMenuModel;
use App\Controllers\BaseController;

class ChartMenu extends BaseController
{
    public function __construct()
    {
        $this->ChartMenuModel = new ChartMenuModel();
        $this->ChartModel = new ChartModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_chartmenu') ? $this->request->getVar('page_chartmenu') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $chartmenu = $this->ChartMenuModel->search($keyword);
        } else {
            $chartmenu = $this->ChartMenuModel;
        }

        $data = [
            'title' => 'PGIC | Chart',
            'chartmenu' => $chartmenu->paginate(100000, 'chart'),
            'pager' => $this->ChartMenuModel->pager,
            'currentPage' => $currentPage
        ];

        if (empty($data['chartmenu'])) {
            session()->setFlashdata('alert', 'Data ' . $keyword . ' tidak ditemukan');
        }
        return view('/main/chartmenu', $data);
    }

    public function chartdetail($slug)
    {
        $data = [
            'title' => 'PGIC | Detail Chart',
            'chart' => $this->ChartModel->getChart($slug)
        ];

        //jika buku tidak ada di tabel
        if (empty($data['chart'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Chart ' . $slug . ' tidak ditemukan');
        }
        return view('main/chartdetail', $data);
    }
}
