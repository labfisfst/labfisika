<?php

namespace App\Controllers;

use App\Models\UserModel; // Kita pakai query builder saja biar cepat
use CodeIgniter\Controller;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Cek database
        $db = \Config\Database::connect();
        $user = $db->table('users')->where('username', $username)->get()->getRowArray();

        if ($user) {
            // Cek Password
            if (password_verify($password, $user['password'])) {
                // Jika Benar, simpan sesi
                $ses_data = [
                    'username' => $user['username'],
                    'is_admin' => true // KUNCI UTAMA
                ];
                $session->set($ses_data);
                return redirect()->to('/');
            }
        }

        // Jika Salah
        $session->setFlashdata('error', 'Username atau Password Salah');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}