<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\AuthModel;

class Auth extends Controller
{
    public function login()
    {
        $model = new AuthModel;
        $table = 'akun_admin';
        $username = $this->request->getPost('usernane');
        $password = $this->request->getPost('password');
        $row = $model->get_data_login($username, $table);

        if ($row == NULL) {
            session()->setFlashdata('pesan', 'Nama Pengguna salah');
            return redirect()->to('/login');
        }
        if (password_verify($password, $row->password)) {
            $data = array(
                'log' => TRUE,
                'foto' => $row->foto,
                'level' => $row->level,
                'username' => $row->username,
                'email' => $row->email,
                'slug' => $row->slug
            );
            session()->set($data);
            session()->setFlashdata('pesan', 'Berhasil Masuk');
            return redirect()->to('/Home/Dashboard');
        };
        session()->setFlashdata('pesan', 'Kata Sandi salah');
        return redirect()->to('/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('pesan', 'Berhasil Keluar');
        return redirect()->to('/login');
    }
}
