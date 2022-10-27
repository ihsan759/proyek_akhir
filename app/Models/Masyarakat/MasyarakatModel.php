<?php

namespace App\Models\Masyarakat;

use CodeIgniter\Model;

class MasyarakatModel extends Model
{
    protected $table = 'kartu_keluarga';
    protected $protectFields = false;
    protected $primaryKey = 'NIK';

    public function getdata()
    {
        return $this->join('detail_kartu_keluarga', 'detail_kartu_keluarga.No_kk = kartu_keluarga.No_kk')
            ->join('detail_ktp', 'detail_ktp.NIK = kartu_keluarga.NIK')
            ->groupStart()
            ->where('detail_kartu_keluarga.rt', session('rt'))
            ->where('detail_kartu_keluarga.rw', session('rw'))
            ->groupEnd()
            ->get()->getResultArray();
    }

    public function viewdata()
    {
        return $this->join('detail_kartu_keluarga', 'detail_kartu_keluarga.No_kk = kartu_keluarga.No_kk')
            ->join('detail_ktp', 'detail_ktp.NIK = kartu_keluarga.NIK')
            ->where('detail_kartu_keluarga.rw', session('rw'))
            ->get()->getResultArray();
    }

    public function getktp()
    {
        return $this->join('detail_ktp', 'detail_ktp.NIK = kartu_keluarga.NIK')
            ->where('detail_ktp.scan_ktp', null)
            ->get()->getResultArray();
    }

    public function getkk()
    {
        return $this->join('detail_kartu_keluarga', 'detail_kartu_keluarga.No_kk = kartu_keluarga.No_kk')
            ->where('detail_kartu_keluarga.scan_kk', null)
            ->get()->getResultArray();
    }

    public function cekdata($NIK)
    {
        return $this->getWhere(['NIK' => $NIK])->getResult();
    }
}
