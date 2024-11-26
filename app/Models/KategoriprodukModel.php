<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriprodukModel extends Model
{
    protected $table            = 'kategori_produk';
    protected $primaryKey       = 'id_kategori';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_kategori',
        'deskripsi',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getProdukKategori()
    {
        return $this->select('produk.id_produk, produk.nama_produk, produk.harga, 
                                produk.deskripsi, kategori_produk.nama_kategori, 
                                (stok_barang.jumlah_barang_masuk - stok_barang.jumlah_barang_keluar) as stok,
                                stok_barang.id_stok')
            ->join('produk', 'produk.id_kategori = kategori_produk.id_kategori')
            ->join('stok_barang', 'stok_barang.id_produk = produk.id_produk')
            ->findAll();
    }
}
