<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailpembelianModel extends Model
{
    protected $table            = 'detail_pembelian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;

    public function DetailPembelian()
    {
        return $this->belongsTo(DetailpembelianModel::class, 'id_detail');
    }

}
