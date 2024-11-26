<?php

namespace App\Controllers;

use App\Models\PembelianModel;

class PembelianController extends BaseController
{
    protected $PembelianModel;

    public function __construct()
    {
        $this->PembelianModel = new PembelianModel();
    }

    function index()
    {
        $data['penjualan'] = $this->PembelianModel->findAll();
        return view('penjualan/index', $data);
    }

    public function store()
    {
        $this->PembelianModel->save([
            'id_pembelian' => $this->request->getPost('id_pembelian'),
            'id_supplier' => $this->request->getPost('id_supplier'),
            'tgl_pembelian' => $this->request->getPost('tgl_pembelian'),
            'id_produk' => $this->request->getPost('id_produk'),
            'total_harga' => $this->request->getPost('total_harga'),
        ]);
        return redirect()->to('pembelian');
    }
}
