<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\dashboardModel;
use App\Controllers\BaseController;

use App\Models\countModel;

class Home extends BaseController
{
	protected $dashboardModel;
	public function __construct()
	{
		$this->dashboardModel = new dashboardModel();
		$this->countModel = new countModel();
	}

	public function pengguna()
	{
		$currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
		//$akun_admin = $this->dashboardModel->findAll();

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$orang = $this->dashboardModel->search($keyword);
		} else {
			$orang = $this->dashboardModel;
		}

		$data = [
			'title' => 'Control Panel | Table Admin',
			'user' => $orang->paginate(10, 'user'),
			'pager' => $this->dashboardModel->pager,
			'currentPage' => $currentPage
		];

		return view('dashboard/pengguna', $data);
	}

	public function home()
	{
		return view('/');
	}

	public function index()
	{

		$currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
		//$akun_admin = $this->dashboardModel->findAll();

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$orang = $this->dashboardModel->search($keyword);
		} else {
			$orang = $this->dashboardModel;
		}

		$data = [
			'title' => 'Control Panel | Table Admin',
			'user' => $orang->paginate(10, 'user'),
			'pager' => $this->dashboardModel->pager,
			'currentPage' => $currentPage
		];

		return view('dashboard/index', $data);
	}

	public function detail($slug)
	{

		$data = [
			'title' => 'Control Panel | Detail Admin',
			'user' => $this->dashboardModel->getDashboard($slug)
		];


		//jika pengguna tidak ada di tabel
		if (empty($data['user'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengguna ' . $slug . ' tidak ditemukan');
		}
		return view('dashboard/detail', $data);
	}

	public function create()
	{

		$data = [
			'title' => 'Control Panel | Tambah Admin',
			'validation' => \Config\Services::validation()
		];

		return view('dashboard/create', $data);
	}

	public function save()
	{

		//validasi input
		if (!$this->validate([
			'username' => [
				'rules'  => 'required|is_unique[user.username]|max_length[12]',
				'errors' => [
					'required' => 'Username harus diisi',
					'is_unique' => 'Username sudah terdaftar',
					'max_length' => 'Maksimal Username adalah 12 digit'
				]
			],
			'level' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Level harus diisi'

				]
			],
			'email' => [
				'rules'  => 'required|is_unique[user.email]',
				'errors' => [
					'required' => 'Email harus diisi',
					'is_unique' => 'Email sudah terdaftar'
				]
			],
			'foto' => [
				'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Hanya mendukung format JPG/JPEG'

				]
			]

		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/Home/create/')->withInput()->with('validation', $validation);
			return redirect()->to('/Home/create')->withInput();
		}

		//ambil gambar
		$fileFoto = $this->request->getFile('foto');
		//apakah tidak ada gambar yang diupload
		if ($fileFoto->getError() == 4) {
			$namaFoto = 'default2.jpg';
		} else {
			//generate nama gambar random
			$namaFoto = $fileFoto->getRandomName();
			//pindahkan gambar ke folder img
			$fileFoto->move('assets/img/admin', $namaFoto);
		}

		//ambil nama gambar
		// $namaFoto = $fileFoto->getName();



		$slug = url_title($this->request->getVar('username'), '-', true);
		$this->dashboardModel->save([
			'level' => $this->request->getVar('level'),
			'foto' => $namaFoto,
			'username' => $this->request->getVar('username'),
			'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
			'email' => $this->request->getVar('email'),
			'slug' => $slug,
		]);

		session()->setFlashdata('pesan', 'Data pengguna berhasil ditambahkan');

		return redirect()->to('/');
	}

	public function delete($id)
	{
		//cari gambar berdasarkan id
		$user = $this->dashboardModel->find($id);

		//cek jika file gambarnya default.jpg
		if ($user['foto'] != 'default2.jpg') {
			//hapus gambar
			unlink('assets/img/admin/' . $user['foto']);
		}


		$this->dashboardModel->delete($id);
		session()->setFlashdata('pesan', 'Data pengguna berhasil dihapus');
		return redirect()->to('/Home/index');
	}

	public function edit($slug)
	{
		$data = [
			'title' => 'Control Panel | Edit Admin',
			'validation' => \Config\Services::validation(),
			'user' => $this->dashboardModel->getDashboard($slug)
		];

		return view('dashboard/edit', $data);
	}

	public function update($id)
	{

		//cek username
		$dashboardLama = $this->dashboardModel->getDashboard($this->request->getVar('slug'));
		if ($dashboardLama['username'] == $this->request->getVar('username')) {
			$rule_username = 'required';
		} else {
			$rule_username = 'required|is_unique[user.username]|max_length[12]';
		}

		//cek email
		$dashboardLama = $this->dashboardModel->getDashboard($this->request->getVar('slug'));
		if ($dashboardLama['email'] == $this->request->getVar('email')) {
			$rule_email = 'required';
		} else {
			$rule_email = 'required|is_unique[user.email]';
		}


		if (!$this->validate([
			'level' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Level harus diisi'

				]
			],
			'username' => [
				'rules'  => $rule_username,
				'errors' => [
					'required' => 'Username harus diisi',
					'is_unique' => 'Username sudah terdaftar',
					'max_length' => 'Maksimal Username adalah 12 digit'
				]
			],
			'email' => [
				'rules'  => $rule_email,
				'errors' => [
					'required' => 'Email harus diisi',
					'is_unique' => 'Email sudah terdaftar'
				]
			],
			'foto' => [
				'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Hanya mendukung format JPG/JPEG',


				]
			]
		])) {
			return redirect()->to('/Home/edit/' . $this->request->getVar('slug'))->withInput();
		}

		$fileFoto = $this->request->getFile('foto');

		//cek gambar, apakah tetap gambar lama
		if ($fileFoto->getError() == 4) {
			$namaFoto = $this->request->getVar('fotoLama');
		} else {
			//generate nama foto random
			$namaFoto = $fileFoto->getRandomName();
			//pindahkan foto
			$fileFoto->move('assets/img/admin', $namaFoto);
			//hapus foto yang lama
			if ($this->request->getVar('fotoLama') != 'default2.jpg') {
				unlink('assets/img/admin/' . $this->request->getVar('fotoLama'));
			}
		}

		$slug = url_title($this->request->getVar('username'), '-', true);
		$this->dashboardModel->save([
			'id' => $id,
			'level' => $this->request->getVar('level'),
			'foto' => $namaFoto,
			'username' => $this->request->getVar('username'),
			'email' => $this->request->getVar('email'),
			'slug' => $slug
		]);

		session()->setFlashdata('pesan', 'Data pengguna berhasil diubah');

		return redirect()->to('/Home/index');
	}

	public function editpassword($slug)
	{
		$data = [
			'title' => 'Control Panel | Edit Password Admin',
			'validation' => \Config\Services::validation(),
			'akun_admin' => $this->dashboardModel->getDashboard($slug)
		];

		return view('dashboard/editpassword', $data);
	}

	public function updatepassword($id)
	{

		//cek username
		$dashboardLama = $this->dashboardModel->getDashboard($this->request->getVar('slug'));
		if ($dashboardLama['username'] == $this->request->getVar('username')) {
			$rule_username = 'required';
		} else {
			$rule_username = 'required|is_unique[user.username]|max_length[12]';
		}

		//cek email
		$dashboardLama = $this->dashboardModel->getDashboard($this->request->getVar('slug'));
		if ($dashboardLama['email'] == $this->request->getVar('email')) {
			$rule_email = 'required';
		} else {
			$rule_email = 'required|is_unique[user.email]';
		}


		if (!$this->validate([
			'password' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Password harus diisi'

				]
			],


		])) {
			return redirect()->to('/Home/editpassword/' . $this->request->getVar('slug'))->withInput();
		}
		$slug = url_title($this->request->getVar('password'), '-', true);
		$this->dashboardModel->save([
			'id' => $id,
			'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
			'slug' => $slug
		]);

		session()->setFlashdata('pesan', 'Password Admin berhasil diubah');

		return redirect()->to('/Home/index');
	}
}
