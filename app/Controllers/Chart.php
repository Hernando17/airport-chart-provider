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
            'title' => 'Dasbor | Data Chart',
            'chart' => $flight->paginate(10, 'chart'),
            'pager' => $this->ChartModel->pager,
            'currentPage' => $currentPage
        ];

        return view('/chart/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Dasbor | Detail Chart',
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
            'title' => 'Dasbor | Tambah Chart',
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

        session()->setFlashdata('pesan', 'Data Chart berhasil ditambahkan');

        return redirect()->to('/chart/index');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $chart = $this->ChartModel->find($id);

        //cek jika file gambarnya default.jpg
        if ($chart['foto'] != 'defaultchart.jpg') {
            //hapus gambar
            unlink('assets/images/chart/' . $chart['foto']);
        }
        if ($chart['file'] != 'filekosong.pdf') {
            //hapus gambar
            unlink('assets/file/pdf/' . $chart['file']);
        }


        $this->ChartModel->delete($id);
        session()->setFlashdata('pesan', 'Data Chart berhasil dihapus');
        return redirect()->to('/chart/index');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Dasbor | Tambah Pengguna',
            'validation' => \Config\Services::validation(),
            'chart' => $this->ChartModel->getChart($slug)
        ];

        return view('chart/edit', $data);
    }

    public function update($id)
    {
        //cek judul
        $chartLama = $this->ChartModel->getChart($this->request->getVar('slug'));
        $fileLama = $this->ChartModel->getChart($this->request->getVar('slug'));

        if ($chartLama['icao'] == $this->request->getVar('icao')) {
            $rule_icao = 'required';
        } else {
            $rule_icao = 'required|is_unique[chart.icao]';
        }

        //Melakukan validasi
        if (!$this->validate([
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
                    'ext_in' => 'Hanya mendukung format file PDF'
                ]
            ],
            'icao' => [
                'rules'  => $rule_icao,
                'errors' => [
                    'required' => 'judul harus diisi',
                    'is_unique' => 'judul sudah terdaftar'


                ]
            ],
            'bandara' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Penulis harus diisi'

                ]
            ],

        ])) {
            return redirect()->to('/chart/detail/edit/' . $this->request->getVar('slug'))->withInput();
        }

        //Melakukan deklarasi Variabel 
        $fileFoto = $this->request->getFile('foto');
        $fileFile = $this->request->getFile('file');


        //cek gambar, apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {

            //generate nama foto random
            $namaFoto = $fileFoto->getRandomName();
            //pindahkan foto
            $fileFoto->move('assets/images/chart', $namaFoto);
            //hapus foto yang lama
            if ($this->request->getVar('fotoLama') != 'defaultchart.jpg') {
                unlink('assets/images/chart/' . $this->request->getVar('fotoLama'));
            }
        }

        //cek file, apakah tetap file lama
        if ($fileFile->getError() == 4) {
            $namaFile = $this->request->getVar('fileLama');
        } else {

            //generate nama foto random
            $namaFile = $fileFile->getRandomName();
            //pindahkan foto
            $fileFile->move('assets/file/pdf', $namaFile);
            //hapus foto yang lama
            if ($this->request->getVar('fileLama') != 'filekosong.pdf') {
                unlink('assets/file/pdf/' . $this->request->getVar('fileLama'));
            }
        }

        $slug = url_title($this->request->getVar('icao'), '-', true);
        $this->ChartModel->save([
            'id' => $id,
            'foto' => $namaFoto,
            'icao' => $this->request->getVar('icao'),
            'bandara' => $this->request->getVar('bandara'),
            'keterangan' => $this->request->getVar('keterangan'),
            'slug' => $slug,
            'file' => $namaFile
        ]);

        session()->setFlashdata('pesan', 'Data Chart berhasil diubah');

        return redirect()->to('/Chart/index');
    }
}
