<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class masyarakatModel extends Model
{
    protected $table = 'kartu_keluarga';
    protected $protectFields = false;
    protected $primaryKey = 'NIK';

    public function getdata()
    {
        return $this->join('detail_kartu_keluarga', 'detail_kartu_keluarga.No_kk = kartu_keluarga.No_kk')
            ->join('detail_ktp', 'detail_ktp.NIK = kartu_keluarga.NIK')
            ->get()->getResultArray();
    }
}
