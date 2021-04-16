<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('index');
	}
	public function chart()
	{
		return view('chart');
	}
	public function login()
	{
		return view('login');
	}
}
