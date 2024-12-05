<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDelutes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'nama_produk',
        'harga',
        'deskripsi',
        'id_kategori',
    ];

    protected bool $allowEmptyInserts = false;

    public function getProdukKategori()
    {
        return $this->select('produk.id_produk, produk.nama_produk, produk.harga,
                                produk.deskripsi, kategori_produk.nama_kategori,
                                COALESCE(SUM(stok_barang.jumlah_barang_masuk) - SUM(stok_barang.jumlah_barang_keluar), 0) as stok')
            ->join('kategori_produk', 'produk.id_kategori = kategori_produk.id_kategori', 'inner')
            ->join('stok_barang', 'stok_barang.id_produk = produk.id_produk', 'left')
            ->groupBy('produk.id_produk')
            ->findAll();
    }
}
