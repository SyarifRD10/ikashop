<?php

namespace App\Controllers;

use App\Models\KategoriprodukModel;
use CodeIgniter\Controller;
use App\Models\ProdukModel; // Sesuaikan dengan nama model Anda
use App\Models\SupplierModel;

class Produk extends BaseController
{
    protected $produk;
    protected $kategori;
    protected $supplier;

    public function __construct()
    {
        $this->produk = new ProdukModel();
        $this->kategori = new KategoriprodukModel();
        $this->supplier = new SupplierModel();
    }
    public function index()
    {
        // Logika untuk menampilkan daftar pelanggan
        $data['produk'] = $this->kategori->getProdukKategori();
        return view('produk/index', $data);
    }
    public function tambah()
    {
        // Logika untuk menampilkan form tambah produk
        $data['kategori'] = $this->kategori->findAll();
        $data['supplier'] = $this->supplier->findAll();
        return view('produk/create', $data);
    }
    public function store()
    {
        // Logika untuk menyimpan data produk baru
        $data = $this->request->getPost(); // Ambil data dari form
        if ($this->produk->save($data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/produk')->with('success', 'Data produk berhasil disimpan.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        // Logika untuk menampilkan form edit produk
        $data['produk'] = $this->produk->find($id);
        $data['kategori'] = $this->kategori->findAll();
        return view('produk/edit', $data);
    }

    public function ubah($id)
    {
        // Logika untuk mengubah data produk
        $data = $this->request->getPost();
        if ($this->produk->update($id, $data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/produk')->with('success', 'Data produk berhasil diubah.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }
    }

    public function hapus($id)
    {
        // Logika untuk menghapus data produk
        if ($this->produk->delete($id)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/produk')->with('success', 'Data produk berhasil dihapus.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
