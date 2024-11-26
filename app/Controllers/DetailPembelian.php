<?php

namespace App\Controllers;

use App\Models\DetailpembelianModel;
use CodeIgniter\Controller;

class DetailPembelian extends BaseController
{
    protected $detail_pembelian;
    public function __construct()
    {
        $this->detail_pembelian = new DetailpembelianModel();
    }
    public function index()
    {
        // Logika untuk menampilkan daftar detail pembelian
        $data['detailpembelian'] = $this->detail_pembelian > findAll();
        return view('pembelian/index', $data);
    }
    public function tambah()
    {
        // Logika untuk menampilkan form tambah detail pembelian
        return view('detailpembelian/tambah');
    }
    public function simpan()
    {
        // Logika untuk menyimpan data detail pembelian baru
        $data = $this->request->getPost(); // Ambil data dari form

        if ($this->detail_pembelian > simpan($data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/detail_pembelian')->with('success', 'detail pembelian berhasil disimpan.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }



    public function update($id)
    {
        // Logika untuk mengubah data detail pembelian
        $data = $this->request->getPost();

        if ($this->detail_pembelian > update($id, $data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/detailpembelian')->with('success', 'Data detail pembelian berhasil diubah.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }
    }

    public function hapus($id)
    {
        // Logika untuk menghapus data detail pembelian
        if ($this->detail_pembelian > hapus($id)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/detail_pembelian')->with('success', 'Data detail pembelian berhasil dihapus.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
