<?php

namespace App\Models;

use CodeIgniter\Model;

class HargabarangModel extends Model
{
    protected $table            = 'hargabarangs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_harga',
        'tgl_berlaku',
        'status',
        'diskon',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}
