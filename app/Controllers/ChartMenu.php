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

    public function chartmenu()
    {
        $currentPage = $this->request->getVar('page_chart') ? $this->request->getVar('page_chart') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $chart = $this->ChartMenuModel->search($keyword);
        } else {
            $chart = $this->ChartMenuModel;
        }

        $data = [
            'title' => 'Library | E-Book',
            'chart' => $chart->paginate(14, 'chart'),
            'pager' => $this->ChartMenuModel->pager,
            'currentPage' => $currentPage
        ];
        return view('/chart', $data);
    }
}
