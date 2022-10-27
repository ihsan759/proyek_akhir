<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class beritaModel extends Model
{
    protected $table      = 'berita';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = ['id', 'id_author', 'judul', 'gambar', 'caption', 'isi'];

    public function pencarian($kunci)
    {
        return $this->table('berita')->like('judul', $kunci);
    }
}
