<?php

namespace App\Controllers;

use App\Models\ProdukModel;
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
        $data['stok_barang'] = $this->stok_barang->getProductStoks();
        // dd($data);
        return view('stok_barang/index', $data);
    }
    public function create($idProduk)
    {
        // Logika untuk menampilkan form tambah pStok Barang
        $data['stok'] = $this->stok_barang->getStokByProdukId($idProduk);
        $data['produk'] = $this->produk->find($idProduk);
        $data['supplier'] = $this->supplier->findAll();
        // dd($data);
        return view('stok_barang/create', $data);
    }

    public function simpan()
    {
        $id_supplier = $this->request->getPost('id_supplier');

        if (empty($id_supplier)) {
            $id_supplier = null;
        }

        $data = [
            'jumlah_barang_masuk' => $this->request->getPost('jumlah_barang_masuk'),
            'jumlah_barang_keluar' => $this->request->getPost('jumlah_barang_keluar'),
            'id_produk' => $this->request->getPost('id_produk'),
            'id_supplier' => $id_supplier,
        ];

        if ($this->stok_barang->save($data)) {
            return redirect()->back()->with('success', 'Data Stok Barang berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        // Logika untuk menampilkan form edit Stok Barang
        $data['stok'] = $this->stok_barang->find($id);
        $data['supplier'] = $this->supplier->findAll();
        return view('stok_barang/edit', $data);
    }

    public function ubah($id)
    {
        $data = $this->request->getPost();

        if ($this->stok_barang->update($id, $data)) {
            return redirect()->to('/produk')->with('success', 'Data Stok Barang berhasil diubah.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }
    }

    public function hapus($id)
    {
        if ($this->stok_barang->delete($id)) {
            return redirect()->to('/stok_barang')->with('success', 'Data Stok Barang berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function report()
    {
        return view('laporan/index');
    }

    public function laporan()
    {
        $startDate = $this->request->getPost('start_date'); 
        $endDate = $this->request->getPost('end_date'); 

        $data['stok_barang'] = $this->stok_barang->getFilteredStoks($startDate, $endDate);
        $data['start_date'] = $startDate;
        $data['end_date'] = $endDate;
        // dd($data);
        return view('stok_barang/report', $data);

    }
}
