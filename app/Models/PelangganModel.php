<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDelutes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'nama_pelanggan',
        'email',
        'telepon',
        'alamat',
    ];
    protected bool $allowEmptyInserts = false;
}
