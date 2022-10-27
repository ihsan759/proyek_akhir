<?php

namespace App\Models\Masyarakat;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $table = 'dokumen';
    protected $protectFields = false;
    protected $useTimestamps = true;

    public function getdata()
    {
        return $this->where('id_petugas', session('id_petugas'))->findAll();
    }

    public function viewdata()
    {
        return $this->join('user', 'user.id_petugas=dokumen.id_petugas')->where('rw', session('rw'))->findAll();
    }
}
