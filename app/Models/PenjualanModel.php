<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'total_harga',
        'tanggal_penjualan',
        'id_pelanggan',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getPenjualanWithDetails()
    {
        $query = $this->db->table('penjualan')
            ->select('penjualan.id_penjualan, penjualan.total_harga, penjualan.tanggal_penjualan,
            penjualan.id_pelanggan, pelanggan.nama_pelanggan, detail_penjualan.kuantitas, produk.nama_produk')
            ->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan')
            ->join('detail_penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan')
            ->join('produk', 'detail_penjualan.id_produk = produk.id_produk')
            ->orderBy('penjualan.id_penjualan')
            ->get()
            ->getResultArray();

        $penjualan = [];
        foreach ($query as $row) {
            $id_penjualan = $row['id_penjualan'];

            if (!isset($penjualan[$id_penjualan])) {
                $penjualan[$id_penjualan] = [
                    'id_penjualan' => $row['id_penjualan'],
                    'nama_pelanggan' => $row['nama_pelanggan'],
                    'tanggal_penjualan' => $row['tanggal_penjualan'],
                    'total_harga' => $row['total_harga'],
                    'detail_penjualan' => [],
                ];
            }

            $penjualan[$id_penjualan]['detail_penjualan'][] = [
                'nama_produk' => $row['nama_produk'],
                'kuantitas' => $row['kuantitas'],
            ];
        }

        return array_values($penjualan);
    }

    public function getLaporanPenjualan()
    {
        return $this->db->table('penjualan')
            ->select('penjualan.id_penjualan,
                 penjualan.total_harga,
                 penjualan.tanggal_penjualan,
                 penjualan.id_pelanggan,
                 pelanggan.nama_pelanggan,
                 detail_penjualan.id_detail,
                 detail_penjualan.harga_satuan,
                 detail_penjualan.kuantitas,
                 detail_penjualan.sub_total,
                 detail_penjualan.id_produk,
                 produk.nama_produk')
            ->join('detail_penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan')
            ->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan')
            ->join('produk', 'detail_penjualan.id_produk = produk.id_produk')
            ->orderBy('penjualan.id_penjualan', 'ASC')
            ->orderBy('detail_penjualan.id_detail', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getPelangganById($id_pelanggan)
    {
        return $this->db->table('pelanggan')
            ->select('id_pelanggan, nama_pelanggan, email, telepon, alamat')
            ->where('id_pelanggan', $id_pelanggan)
            ->get()
            ->getRowArray();
    }

    public function getDetailPenjualanById($id_penjualan)
    {
        return $this->db->table('penjualan p')
            ->select('p.id_penjualan, p.total_harga, p.tanggal_penjualan,
                     dp.id_detail, dp.harga_satuan, dp.kuantitas, dp.sub_total,
                     dp.id_produk, produk.nama_produk, produk.deskripsi')
            ->join('detail_penjualan dp', 'p.id_penjualan = dp.id_penjualan')
            ->join('produk', 'dp.id_produk = produk.id_produk')
            ->where('p.id_penjualan', $id_penjualan)
            ->get()
            ->getResultArray();
    }
}
