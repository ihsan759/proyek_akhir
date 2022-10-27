<?php

namespace App\Models\Masyarakat;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'warga';
    protected $useTimestamps = true;
    protected $primaryKey = 'NIK';


    protected $allowedFields = ['NIK', 'password', 'id_petugas', 'status'];

    public function getnik()
    {
        return $this->join('kartu_keluarga', 'warga.NIK = kartu_keluarga.NIK')
            ->join('detail_kartu_keluarga', 'detail_kartu_keluarga.No_kk = kartu_keluarga.No_kk')
            ->join('detail_ktp', 'detail_ktp.NIK = kartu_keluarga.NIK')
            ->groupStart()
            ->where('detail_ktp.scan_ktp!=', null)
            ->where('detail_kartu_keluarga.scan_kk!=', null)
            ->where('status', 'Tidak Aktif')
            ->where('id_petugas', session('id_petugas'))
            ->groupEnd()
            ->get()->getResultArray();
    }

    public function getakun()
    {
        return $this->join('kartu_keluarga', 'kartu_keluarga.NIK = warga.NIK')->orderBy('warga.NIK', 'desc')->where('id_petugas', session('id_petugas'))->findAll();
    }
}
