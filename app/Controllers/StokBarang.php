<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use CodeIgniter\Controller;
use App\Models\StokBarangModel;
use App\Models\SupplierModel;

class StokBarang extends BaseController
{
    protected $stok_barang;
    protected $produk;
    protected $supplier;

    public function __construct()
    {
        $this->stok_barang = new StokBarangModel();
        $this->produk = new ProdukModel();
        $this->supplier = new SupplierModel();
    }
    public function index()
    {
        // Logika untuk menampilkan daftar Stok Barang
        $data['stok_barang'] = $this->stok_barang->findAll();
        return view('stok_barang/index', $data);
    }
    public function create($idProduk)
    {
        // Logika untuk menampilkan form tambah pStok Barang
        $data['stok'] = $this->stok_barang->where('id_produk', $idProduk)->findAll();
        // dd($data);
        $data['supplier'] = $this->supplier->findAll();
        // dd($data);
        return view('stok_barang/tambah', $data);
    }

    public function simpan()
    {
        // Logika untuk menyimpan data Stok Barang baru
        $data = $this->request->getPost(); // Ambil data dari form
        if ($this->stok_barang->save($data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/stok_barang')->with('success', 'Data Stok Barang berhasil disimpan.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        // Logika untuk menampilkan form edit Stok Barang
        $data['stok_barang'] = $this->stok_barang->find($id);
        return view('stok_barang/edit', $data);
    }

    public function ubah($id)
    {
        // Logika untuk mengubah Stok Barang
        $data = $this->request->getPost();

        if ($this->stok_barang->update($id, $data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/stok_barang')->with('success', 'Data Stok Barang berhasil diubah.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }
    }

    public function hapus($id)
    {
        // Logika untuk menghapus data Stok Barang
        if ($this->stok_barang->delete($id)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/stok_barang')->with('success', 'Data Stok Barang berhasil dihapus.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
