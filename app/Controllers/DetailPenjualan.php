<?php

namespace App\Controllers;

use App\Models\DetailPenjualanModel;
use App\Models\PenjualanModel;
use App\Models\ProdukModel;

// Sesuaikan dengan nama model Anda

class DetailPenjualan extends BaseController
{
    protected $detail_penjualan;
    protected $produk;
    protected $penjualan;

    public function __construct()
    {
        $this->detail_penjualan = new DetailPenjualanModel();
        $this->produk = new ProdukModel();
        $this->penjualan = new PenjualanModel();
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
        $data['detail'] = $this->detail_penjualan->find($id);
        $data['produk'] = $this->produk->findAll();
        // dd($data);
        return view('penjualan/edit', $data);
    }

    public function ubah($id)
    {
        $data = $this->request->getPost();

        $produk = $this->produk->find($data['id_produk']);
        $hargaSatuan = $produk['harga'];

        $detailData = [
            'id_produk' => $data['id_produk'],
            'harga_satuan' => $hargaSatuan,
            'kuantitas' => $data['kuantitas'],
            'sub_total' => $hargaSatuan * $data['kuantitas'],
        ];

        if (!$this->detail_penjualan->update($id, $detailData)) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data detail penjualan.');
        }

        $idPenjualan = $data['id_penjualan'];

        $totalHarga = $this->detail_penjualan->where('id_penjualan', $idPenjualan)
            ->selectSum('sub_total', 'total_sub_total')
            ->first();

        $totalHarga = $totalHarga['total_sub_total'] ?? 0;

        $penjualanData = [
            'total_harga' => $totalHarga,
        ];

        if ($this->penjualan->update($idPenjualan, $penjualanData)) {
            return redirect()->to('/penjualan')->with('success', 'Data penjualan berhasil diubah.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah total harga penjualan.');
        }
    }

    public function hapus($id)
    {
        $detail = $this->detail_penjualan->find($id);
        if (!$detail) {
            return redirect()->back()->with('error', 'Data detail penjualan tidak ditemukan.');
        }

        $idPenjualan = $detail['id_penjualan'];

        if ($this->detail_penjualan->delete($id)) {
            $totalHarga = $this->detail_penjualan
                ->where('id_penjualan', $idPenjualan)
                ->selectSum('sub_total', 'total_sub_total')
                ->first();

            $totalHarga = $totalHarga['total_sub_total'] ?? 0;

            $penjualanData = [
                'total_harga' => $totalHarga,
            ];

            if ($this->penjualan->update($idPenjualan, $penjualanData)) {
                return redirect()->to('/penjualan')->with('success', 'Data detail penjualan berhasil dihapus dan total harga diperbarui.');
            } else {
                return redirect()->back()->with('error', 'Data detail penjualan berhasil dihapus, tetapi gagal memperbarui total harga penjualan.');
            }
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data detail penjualan.');
        }
    }

}
