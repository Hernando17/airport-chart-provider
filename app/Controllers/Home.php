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
		$data = [
			'title' => 'PGIC | Beranda'
		];

		return view('/main/index', $data);
	}
	public function tentang()
	{
		$data = [
			'title' => 'PGIC | Beranda'
		];

		return view('/errors/html/error_404', $data);
	}
	public function livery()
	{
		$data = [
			'title' => 'PGIC | Beranda'
		];

		return view('/errors/html/error_404', $data);
	}
	public function xplane11()
	{
		$data = [
			'title' => 'PGIC | Beranda'
		];

		return view('/errors/html/error_404', $data);
	}
	public function prepar3d()
	{
		$data = [
			'title' => 'PGIC | Beranda'
		];

		return view('/errors/html/error_404', $data);
	}
	public function fs2020()
	{
		$data = [
			'title' => 'PGIC | Beranda'
		];

		return view('/errors/html/error_404', $data);
	}
	public function donasi()
	{
		$data = [
			'title' => 'PGIC | Beranda'
		];

		return view('/errors/html/error_404', $data);
	}
}
