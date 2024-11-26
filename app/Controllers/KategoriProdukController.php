<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriprodukModel;
use CodeIgniter\HTTP\ResponseInterface;

class KategoriProdukController extends BaseController
{
    protected $kategori;

    public function __construct()
    {
        $this->kategori = new KategoriprodukModel();
    }

    public function index()
    {
        $data['kategori'] = $this->kategori->findAll();
        return view('kategori/index', $data);
    }

    public function tambah()
    {
        return view('kategori/create');
    }

    public function create()
    {
        $data = $this->request->getPost();

        // dd($data);

        if ($this->kategori->save($data)) {
            return redirect()->to('/kategori')->with('success', 'Data laporan Penjualan berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        $data['kategori'] = $this->kategori->find($id);
        return view('kategori/edit', $data);
    }

    public function ubah($id)
    {
        $data = $this->request->getPost();

        if ($this->kategori->update($id, $data)) {
            return redirect()->to('/kategori')->with('success', 'Data produk berhasil diubah.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }
    }

    public function hapus($id)
    {
        if ($this->kategori->delete($id)) {
            return redirect()->to('/kategori')->with('success', 'Data produk berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
