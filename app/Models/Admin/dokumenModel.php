<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class dokumenModel extends Model
{
    protected $table      = 'dokumen';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'nama_dokumen', 'status', 'id_petugas'];
}
