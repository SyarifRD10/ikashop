<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanPenjualanModel extends Model
{
    protected $table = 'laporan_penjualan';
    protected $primaryKey = 'id_laporan_penjualan';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDelutes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'total_penjualan',
        'jumlah_transaksi',
        'jumlah_produk_terjual',
        'id_detail',
        'id_usser,'
    ];

    protected bool $allowEmptyInserts = false;
}
