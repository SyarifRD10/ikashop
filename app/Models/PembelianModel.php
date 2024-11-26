<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table = 'pembelian';
    protected $primaryKey = 'id_pembelian';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDelutes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'id_supplier',
        'total_harga',
        'id_pelanggan',
        'id_produk',
        'id_user',
        'tgl_pembelian',
    ];
    protected bool $allowEmptyInserts = false;

    // Relasi dengan model Supplier
    public function supplier()
    {
        return $this->belongsTo(SupplierModel::class, 'id_supplier');
    }
}
