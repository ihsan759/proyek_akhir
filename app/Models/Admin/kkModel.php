<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class kkModel extends Model
{
    protected $table = 'detail_kartu_keluarga';
    protected $allowedFields = ['scan_kk', 'No_kk', 'rt', 'rw'];
    protected $primaryKey = 'No_kk';
}
