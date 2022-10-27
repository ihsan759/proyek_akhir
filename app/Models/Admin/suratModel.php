<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class suratModel extends Model
{
    protected $table      = 'surat';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = ['id', 'jenis_surat', 'surat_pengantar', 'tanggal_selesai', 'status', 'alasan', 'id_pemohon', 'NIK', 'id_petugas'];
}
