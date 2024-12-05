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
        $data['detailpembelian'] = $this->detail_pembelian->findAll();
        return view('pembelian/index', $data);
    }
    public function tambah()
    {
        return view('detailpembelian/tambah');
    }
    public function simpan()
    {
        $data = $this->request->getPost(); 

        if ($this->detail_pembelian->simpan($data)) {
            return redirect()->to('/detail_pembelian')->with('success', 'detail pembelian berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }



    public function update($id)
    {
        $data = $this->request->getPost();

        if ($this->detail_pembelian->update($id, $data)) {
            return redirect()->to('/detailpembelian')->with('success', 'Data detail pembelian berhasil diubah.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }
    }

    public function hapus($id)
    {
        if ($this->detail_pembelian -> hapus($id)) {
            return redirect()->to('/detail_pembelian')->with('success', 'Data detail pembelian berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
