<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\DetailPenjualanModel; // Sesuaikan dengan nama model Anda

class DetailPenjualan extends BaseController
{
    protected $detail_penjualan;
    public function __construct()
    {
        $this->detail_penjualan = new DetailPenjualanModel();
    }
    public function index()
    {
        // Logika untuk menampilkan daftar penjualan
        $data['detail_penjualan'] = $this->detail_penjualan->findAll();
        return view('detail_penjualan/index', $data);
    }
    public function tambah()
    {
        // Logika untuk menampilkan form tambah penjualan
        return view('detail_penjualan/tambah');
    }
    public function simpan()
    {
        // Logika untuk menyimpan data pelanggan baru
        $data = $this->request->getPost(); // Ambil data dari form

        if ($this->detail_penjualan->save($data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/detail_penjualan')->with('success', 'Data penjualan berhasil disimpan.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        // Logika untuk menampilkan form edit penjualan
        $data['detail_penjualan'] = $this->detail_penjualan->find($id);
        return view('detail_penjualan/edit', $data);
    }

    public function ubah($id)
    {
        // Logika untuk mengubah data penjualan
        $data = $this->request->getPost();

        if ($this->detail_penjualan->update($id, $data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/pelanggan')->with('success', 'Data penjualan berhasil diubah.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }
    }

    public function hapus($id)
    {
        // Logika untuk menghapus data penjualan
        if ($this->detail_penjualan->delete($id)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/pelanggan')->with('success', 'Data penjualan berhasil dihapus.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
