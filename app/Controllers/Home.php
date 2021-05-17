<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DashboardModel;
use App\Controllers\BaseController;

use App\Models\CountModel;

class Home extends BaseController
{
	public function index()
	{
		return view('/index');
	}
}
