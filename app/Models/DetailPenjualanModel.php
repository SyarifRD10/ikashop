<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPenjualanModel extends Model
{
    protected $table = 'detail_Penjualan';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = [
        'id_penjualan',
        'id_produk',
        'sub_total',
        'kuantitas',
        'harga_satuan',
    ];
    protected bool $allowEmptyInserts = false;

    // Relasi dengan model Penjualan
    public function penjualan()
    {
        return $this->belongsTo(LaporanPenjualanModel::class, 'id_penjualan');
    }

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(StokBarangModel::class, 'id_stok');
    }
}
