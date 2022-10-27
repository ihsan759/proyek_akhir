<?php

namespace App\Models\Masyarakat;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'berita';
    protected $useTimestamps = true;

    protected $allowedFields = ['judul', 'id_author', 'gambar', 'caption', 'isi'];

    public function getdetail($id)
    {
        return $this->join('user', 'user.id_petugas = berita.id_author')->where('id', $id)->first();
    }

    public function getberita()
    {
        return $this->where('id_author', session('id_petugas'))->orderBy('id', 'desc')->findAll();
    }
}
