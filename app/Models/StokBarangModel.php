<?php

namespace App\Models;

use CodeIgniter\Model;

class StokBarangModel extends Model
{
    protected $table = 'stok_barang';
    protected $primaryKey = 'id_stok';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDelutes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'id_produk',
        'jumlah_barang_masuk',
        'jumlah_barang_keluar'
    ];
    protected bool $allowEmptyInserts = false;

    public function getStokByProdukId($id)
    {
        return $this->select('stok_barang.id_produk, stok_barang.jumlah_barang_masuk,
                            stok_barang.jumlah_barang_keluar, produk.nama_produk, produk.harga,
                            (stok_barang.jumlah_barang_masuk - stok_barang.jumlah_barang_keluar) as stok,
                             produk.deskripsi')
            ->join('produk', 'produk.id_produk = stok_barang.id_produk')
            ->where('stok_barang.id_produk', $id)
            ->findAll();
    }
}
