<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\userModel; // Sesuaikan dengan nama model Anda

class user extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function index()
    {
        // Logika untuk menampilkan form login
        if ($this->userModel->countAllResults() == 0) {
            $this->userModel->insert(['username' => 'admin', 'password' => password_hash('admin1', PASSWORD_DEFAULT), 'role' => 'admin']);
        }
        return view('user');
    }
    public function masuk()
    {
        // Logika untuk proses login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();
        // dd($user);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Buat session untuk user
                session()->set('id_user', $user['id_user']);
                session()->set('username', $user['username']);
                session()->set('role', $user['role']);

                // Redirect ke halaman dashboard
                return redirect()->to(base_url());
            } else {
                // Tampilkan pesan error
                return redirect()->back()->with('error', 'Password salah!');
            }
        } else {
            // Tampilkan pesan error
            return redirect()->back()->with('error', 'Username tidak ditemukan!');
        }
    }

    public function keluar()
    {
        // Logika untuk proses logout
        session()->destroy();
        return redirect()->to(base_url('user'));
    }
}
