<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailPenjualanModel;
use App\Models\PelangganModel;
use App\Models\PenjualanModel;
use App\Models\ProdukModel;

class PenjualanController extends BaseController
{
    protected $PenjualanModel;
    protected $produk;
    protected $pelanggan;
    protected $detail;

    public function __construct()
    {
        $this->PenjualanModel = new PenjualanModel();
        $this->produk = new ProdukModel();
        $this->pelanggan = new PelangganModel();
        $this->detail = new DetailPenjualanModel();
    }

    public function index()
    {
        $data['penjualan'] = $this->PenjualanModel->getPenjualanWithDetails();
        // dd($data);
        return view('penjualan/index', $data);
    }

    public function create()
    {
        $data['produk'] = $this->produk->findAll();
        return view('penjualan/create', $data);
    }

    public function store()
    {
        $produkIds = $this->request->getPost('produk');
        $kuantitas = $this->request->getPost('kuantitas');
        $namaPelanggan = $this->request->getPost('nama_pelanggan');
        $email = $this->request->getPost('email');
        $telepon = $this->request->getPost('telepon');
        $alamat = $this->request->getPost('alamat');
        $tglPenjualan = $this->request->getPost('tgl_penjualan');

        $dataPelanggan = [
            'nama_pelanggan' => $namaPelanggan,
            'email' => $email,
            'telepon' => $telepon,
            'alamat' => $alamat,
        ];

        $idPelanggan = $this->pelanggan->insert($dataPelanggan);

        $totalHarga = 0;

        if ($produkIds) {
            foreach ($produkIds as $idProduk) {
                $produk = $this->produk->find($idProduk);
                $qty = isset($kuantitas[$idProduk]) ? $kuantitas[$idProduk] : 0;
                $totalHarga += $produk['harga'] * $qty;
            }
        }

        $dataPenjualan = [
            'id_pelanggan' => $idPelanggan,
            'tgl_penjualan' => $tglPenjualan,
            'total_harga' => $totalHarga,
        ];
        $idPenjualan = $this->PenjualanModel->insert($dataPenjualan);

        foreach ($produkIds as $idProduk) {
            $qty = isset($kuantitas[$idProduk]) ? $kuantitas[$idProduk] : 0;
            $produk = $this->produk->find($idProduk);
            $total = $produk['harga'] * $qty;

            $dataDetail = [
                'id_penjualan' => $idPenjualan,
                'id_produk' => $idProduk,
                'kuantitas' => $qty,
                'harga_satuan' => $produk['harga'],
                'sub_total' => $total,
            ];
            $this->detail->insert($dataDetail);
        }

        return redirect()->to('/penjualan');
    }

    public function detail($id)
    {
        $data['pelanggan'] = $this->PenjualanModel->getPelangganById($id);
        $data['penjualan'] = $this->PenjualanModel->getDetailPenjualanById($id);
        return view('penjualan/detail', $data);
    }

    public function delete($id)
    {
        if ($this->PenjualanModel->delete($id)) {
            return redirect()->to('/penjualan')->with('success', 'Data penjualan berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
