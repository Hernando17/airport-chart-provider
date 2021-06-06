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
        $currentPage = $this->request->getVar('page_chartmenu') ? $this->request->getVar('page_chartmenu') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $chartmenu = $this->ChartMenuModel->search($keyword);
        } else {
            $chartmenu = $this->ChartMenuModel;
        }

        $data = [
            'title' => 'Library | E-Book',
            'chart' => $chartmenu->paginate(14, 'chart'),
            'pager' => $this->ChartMenuModel->pager,
            'currentPage' => $currentPage
        ];
        return view('/chartmenu', $data);
    }
}
