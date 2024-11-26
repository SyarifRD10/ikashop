<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PelangganModel; // Sesuaikan dengan nama model Anda

class Pelanggan extends BaseController
{
    protected $pelangganModel;
    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }
    public function index()
    {
        // Logika untuk menampilkan daftar pelanggan
        $data['pelanggan'] = $this->pelangganModel->findAll();
        return view('pelanggan/index', $data);
    }
    public function tambah()
    {
        // Logika untuk menampilkan form tambah pelanggan
        return view('pelanggan/tambah');
    }
    public function simpan()
    {
        // Logika untuk menyimpan data pelanggan baru
        $data = $this->request->getPost(); // Ambil data dari form

        if ($this->pelangganModel->save($data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/pelanggan')->with('success', 'Data pelanggan berhasil disimpan.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        // Logika untuk menampilkan form edit pelanggan
        $data['pelanggan'] = $this->pelangganModel->find($id);
        return view('pelanggan/edit', $data);
    }

    public function ubah($id)
    {
        // Logika untuk mengubah data pelanggan
        $data = $this->request->getPost();

        if ($this->pelangganModel->update($id, $data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/pelanggan')->with('success', 'Data pelanggan berhasil diubah.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }
    }

    public function hapus($id)
    {
        // Logika untuk menghapus data pelanggan
        if ($this->pelangganModel->delete($id)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/pelanggan')->with('success', 'Data pelanggan berhasil dihapus.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
