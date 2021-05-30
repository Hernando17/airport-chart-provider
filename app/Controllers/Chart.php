<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ChartModel;
use App\Controllers\BaseController;
use App\Models\CountModel;

class Chart extends BaseController
{
    protected $ChartModel;
    public function __construct()
    {
        $this->ChartModel = new ChartModel();
        $this->CountModel = new CountModel();
    }

    public function home()
    {
        return view('/');
    }

    public function index()
    {

        $currentPage = $this->request->getVar('page_chart') ? $this->request->getVar('page_chart') : 1;
        //$akun_admin = $this->ChartModel->findAll();

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $flight = $this->ChartModel->search($keyword);
        } else {
            $flight = $this->ChartModel;
        }

        $data = [
            'title' => 'Dasbor | Beranda',
            'chart' => $flight->paginate(10, 'chart'),
            'pager' => $this->ChartModel->pager,
            'currentPage' => $currentPage
        ];

        return view('/chart/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Dasbor | Detail Pengguna',
            'chart' => $this->ChartModel->getChart($slug)
        ];


        //jika pengguna tidak ada di tabel
        if (empty($data['chart'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengguna ' . $slug . ' tidak ditemukan');
        }
        return view('chart/detail', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Dasbor | Tambah Pengguna',
            'validation' => \Config\Services::validation()
        ];

        return view('chart/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'icao' => [
                'rules'  => 'required|is_unique[chart.icao]',
                'errors' => [
                    'required' => 'ICAO harus diisi',
                    'is_unique' => 'ICAO sudah terdaftar'
                ]
            ],
            'bandara' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama bandara harus diisi'

                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Hanya mendukung format JPG/JPEG'

                ]
            ],
            'file' => [
                'rules' => 'ext_in[file,pdf]',
                'errors' => [
                    'ext_in' => 'Yang anda pilih bukan format PDF'
                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/Home/create/')->withInput()->with('validation', $validation);
            return redirect()->to('/chart/create')->withInput();
        }

        //ambil gambar
        $fileFoto = $this->request->getFile('foto');
        //apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'defaultchart.jpg';
        } else {
            //generate nama gambar random
            $namaFoto = $fileFoto->getRandomName();
            //pindahkan gambar ke folder img
            $fileFoto->move('assets/images/chart', $namaFoto);
        }

        //ambil file
        $fileFile = $this->request->getFile('file');
        //apakah tidak ada gambar yang diupload
        if ($fileFile->getError() == 4) {
            $namaFile = 'filekosong.pdf';
        } else {
            //generate nama gambar random
            $namaFile = $fileFile->getRandomName();
            //pindahkan gambar ke folder img
            $fileFile->move('assets/file/pdf', $namaFile);
        }

        $slug = url_title($this->request->getVar('icao'), '-', true);
        $this->ChartModel->save([
            'icao' => $this->request->getVar('icao'),
            'foto' => $namaFoto,
            'file' => $namaFile,
            'bandara' => $this->request->getVar('bandara'),
            'keterangan' => $this->request->getVar('keterangan'),
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data pengguna berhasil ditambahkan');

        return redirect()->to('/chart/index');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $chart = $this->ChartModel->find($id);

        //cek jika file gambarnya default.jpg
        if ($chart['foto'] != 'defaultchart.png') {
            //hapus gambar
            unlink('assets/images/chart/' . $chart['foto']);
        }
        if ($chart['file'] != 'filekosong.pdf') {
            //hapus gambar
            unlink('assets/file/pdf/' . $chart['file']);
        }


        $this->ChartModel->delete($id);
        session()->setFlashdata('pesan', 'Chart berhasil dihapus');
        return redirect()->to('/chart/index');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Dasbor | Ubah Data',
            'validation' => \Config\Services::validation(),
            'user' => $this->ChartModel->getDashboard($slug)
        ];

        return view('dashboard/edit', $data);
    }

    public function update($id)
    {
        //cek username
        $dashboardLama = $this->ChartModel->getDashboard($this->request->getVar('slug'));
        if ($dashboardLama['username'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[user.username]|max_length[12]';
        }

        //cek email
        $dashboardLama = $this->ChartModel->getDashboard($this->request->getVar('slug'));
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
            return redirect()->to('/dashboard/detail/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        //cek gambar, apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            //generate nama foto random
            $namaFoto = $fileFoto->getRandomName();
            //pindahkan foto
            $fileFoto->move('assets/images/pp', $namaFoto);
            //hapus foto yang lama
            if ($this->request->getVar('fotoLama') != 'default2.jpg') {
                unlink('assets/images/pp/' . $this->request->getVar('fotoLama'));
            }
        }

        $slug = url_title($this->request->getVar('username'), '-', true);
        $this->ChartModel->save([
            'id' => $id,
            'level' => $this->request->getVar('level'),
            'foto' => $namaFoto,
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data pengguna berhasil diubah');

        return redirect()->to('/dashboard/pengguna');
    }

    public function editpassword($slug)
    {
        $data = [
            'title' => 'Dasbor | Ubah Kata Sandi',
            'validation' => \Config\Services::validation(),
            'user' => $this->ChartModel->getDashboard($slug)
        ];

        return view('dashboard/editpassword', $data);
    }

    public function updatepassword($id)
    {
        if (!$this->validate([
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ],

        ])) {
            return redirect()->to('/dashboard/editpassword/' . $this->request->getVar('slug'))->withInput();
        }
        $slug = url_title($this->request->getVar('password'), '-', true);
        $this->ChartModel->save([
            'id' => $id,
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Password Admin berhasil diubah');
        return redirect()->to('/dashboard/pengguna');
    }
}
