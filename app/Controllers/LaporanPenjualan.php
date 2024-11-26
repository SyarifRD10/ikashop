<?php

namespace App\Controllers;

use App\Models\LaporanPenjualanModel;
use CodeIgniter\Controller;
use App\Models\PenjualanModel;


class LaporanPenjualan extends BaseController
{
    protected $laporan_penjualan;
    protected $penjualan;
    public function __construct()
    {
        $this->laporan_penjualan = new LaporanPenjualanModel();
        $this->penjualan = new PenjualanModel();
    }
    public function index()
    {
        // Logika untuk menampilkan daftar laporan Penjualan
        $data['laporan_penjualan'] = $this->laporan_penjualan->findAll();
        return view('laporan/index', $data);
    }
    public function tambah()
    {
        // Logika untuk menampilkan form tambah plaporan Penjualan
        return view('laporan/tambah');
    }
    public function simpan()
    {
        // Logika untuk menyimpan data laporan Penjualan baru
        $data = $this->request->getPost(); // Ambil data dari form
        if ($this->laporan_penjualan->save($data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/laporan_penjualan')->with('success', 'Data laporan Penjualan berhasil disimpan.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        // Logika untuk menampilkan form edit laporan Penjualan
        $data['laporan_penjualan'] = $this->laporan_penjualan->find($id);
        return view('laporan/edit', $data);
    }

    public function ubah($id)
    {
        // Logika untuk mengubah laporan Penjualan
        $data = $this->request->getPost();

        if ($this->laporan_penjualan->update($id, $data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/laporan_penjualan')->with('success', 'Data laporan Penjualan berhasil diubah.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }
    }

    public function hapus($id)
    {
        // Logika untuk menghapus data laporan Penjualan
        if ($this->laporan_penjualan->delete($id)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/laporan_penjualan')->with('success', 'Data laporan Penjualan berhasil dihapus.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function cetak()
    {
        $penjualanData = $this->penjualan->getLaporanPenjualan();

        // Mengelompokkan data berdasarkan id_penjualan
        $penjualanGrouped = [];
        foreach ($penjualanData as $p) {
            $penjualanGrouped[$p['id_penjualan']]['penjualan'] = [
                'id_penjualan' => $p['id_penjualan'],
                'total_harga' => $p['total_harga'],
                'tanggal_penjualan' => $p['tanggal_penjualan'],
                'nama_pelanggan' => $p['nama_pelanggan'],
            ];
            $penjualanGrouped[$p['id_penjualan']]['details'][] = [
                'nama_produk' => $p['nama_produk'],
                'kuantitas' => $p['kuantitas'],
                'harga_satuan' => $p['harga_satuan'],
                'sub_total' => $p['sub_total'],
            ];
        }

        // Kirim data yang sudah dikelompokkan ke view
        $data['penjualanGrouped'] = $penjualanGrouped;
        return view('laporan/cetak', $data);
    }
}
