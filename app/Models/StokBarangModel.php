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
        'jumlah_barang_masuk',
        'jumlah_barang_keluar',
        'tanggal',
        'id_supplier',
        'id_produk',
    ];
    protected bool $allowEmptyInserts = true;

    public function getStokByProdukId($id)
    {
        return $this->select('stok_barang.id_stok, stok_barang.id_produk, stok_barang.jumlah_barang_masuk,
                            stok_barang.jumlah_barang_keluar, stok_barang.tanggal, produk.nama_produk, produk.harga,
                            (stok_barang.jumlah_barang_masuk - stok_barang.jumlah_barang_keluar) as stok,
                             produk.deskripsi, supplier.nama_supplier')
            ->join('produk', 'produk.id_produk = stok_barang.id_produk')
            ->join('supplier', 'supplier.id_supplier = stok_barang.id_supplier', 'left')
            ->where('stok_barang.id_produk', $id)
            ->findAll();
    }

    public function getProductStoks()
    {
        return $this->select('stok_barang.id_stok, stok_barang.id_produk, produk.nama_produk, produk.harga,
                        MAX(stok_barang.jumlah_barang_masuk) AS jumlah_barang_masuk,
                        MAX(stok_barang.jumlah_barang_keluar) AS jumlah_barang_keluar,
                        MAX(stok_barang.tanggal) AS tanggal,
                        supplier.nama_supplier,
                        (SUM(stok_barang.jumlah_barang_masuk) - SUM(stok_barang.jumlah_barang_keluar)) AS stok_tersedia')
            ->join('produk', 'produk.id_produk = stok_barang.id_produk', 'left')
            ->join('supplier', 'supplier.id_supplier = stok_barang.id_supplier', 'left')
            ->groupBy('stok_barang.id_stok, stok_barang.id_produk, produk.nama_produk, produk.harga, supplier.nama_supplier')
            ->orderBy('stok_barang.id_produk', 'DESC')
            ->findAll();
    }

    public function getFilteredStoks($startDate, $endDate)
    {
        return $this->select('
            stok_barang.id_produk,
            produk.nama_produk,
            produk.harga,
            supplier.nama_supplier,
            stok_barang.tanggal,
            SUM(IFNULL(stok_barang.jumlah_barang_masuk, 0)) AS jumlah_barang_masuk,
            SUM(IFNULL(stok_barang.jumlah_barang_keluar, 0)) AS jumlah_barang_keluar,
            (SUM(IFNULL(stok_barang.jumlah_barang_masuk, 0)) - SUM(IFNULL(stok_barang.jumlah_barang_keluar, 0))) AS stok_tersedia
        ')
            ->join('produk', 'produk.id_produk = stok_barang.id_produk', 'left')
            ->join('supplier', 'supplier.id_supplier = stok_barang.id_supplier', 'left')
            ->where('stok_barang.tanggal >=', $startDate)
            ->where('stok_barang.tanggal <=', $endDate)
            ->groupBy('stok_barang.id_produk, produk.nama_produk, produk.harga, supplier.nama_supplier, stok_barang.tanggal')
            ->orderBy('stok_barang.tanggal', 'ASC')
            ->findAll();
    }

}
